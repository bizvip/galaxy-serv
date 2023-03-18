<?php
/******************************************************************************
 * Copyright (c) 2023 A. C.                                                   *
 ******************************************************************************/

declare(strict_types=1);

namespace App\Utils;

use App\Constants\BizConst;
use Hyperf\DbConnection\Db;
use JetBrains\PhpStorm\ArrayShape;

trait SQLHelper
{
    protected function selectToString(array $select): string
    {
        return $select === ['*'] ? '*' : '"'.implode('","', $select).'"';
    }

    protected function prepareWhere(array $where): array
    {
        $wh = '';
        $vs = [];
        foreach ($where as $k => $v) {
            $wh   .= (sprintf('"%s"=? AND ', $k));
            $vs[] = $v;
        }
        $wh = rtrim($wh, 'AND ');

        return ['where' => $wh, 'bindings' => $vs];
    }

    protected function prepareValues(array $values): array
    {
        $ss = '';
        $vs = [];
        foreach ($values as $k => $v) {
            $ss   .= sprintf('"%s"=?,', $k);
            $vs[] = $v;
        }

        return ['set' => rtrim($ss, ','), 'bindings' => $vs];
    }

    protected function needCreatedAt(array $values): array
    {
        if (!isset($values['created_at'])) {
            $values['created_at'] = date(BizConst::DATETIME_FORMAT);
        }

        return $values;
    }

    protected function needUpdatedAt(array $values): array
    {
        if (!isset($values['updated_at'])) {
            $values['updated_at'] = date(BizConst::DATETIME_FORMAT);
        }

        return $values;
    }

    /**
     * !!!!!! 此處sql語句綁定了postgresql特性，無法與其他sql數據庫通用 !!!!!!
     *
     * @param  string  $lock
     * @return string
     */
    private function lockToSQL(string $lock): string
    {
        return match ($lock) {
            BizConst::FOR_UPDATE => ' FOR UPDATE',
            BizConst::FOR_SHARE => ' FOR SHARE',
            BizConst::FOR_NO_KEY_UPDATE => ' FOR NO KEY UPDATE',
            BizConst::FOR_KEY_SHARE => ' FOR KEY SHARE',
            default => throw new \RuntimeException('Unexpected value'),
        };
    }

    protected function selectManyIds(string $table, array $where, string $lock = null): ?array
    {
        ['where' => $whereStr, 'bindings' => $bindings] = $this->prepareWhere($where);

        // 單獨執行不需要事務 如果被事務內調用需要FOR UPDATE
        $sql = sprintf('SELECT "id" FROM "%s" WHERE %s', $table, $whereStr);

        if ($lock) {
            $sql .= $this->lockToSQL($lock);
        }

        $ids = Db::select($sql, $bindings);
        if (empty($ids)) {
            return null;
        }

        return array_column($ids, 'id');
    }
}
