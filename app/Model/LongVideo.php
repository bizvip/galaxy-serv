<?php

declare(strict_types=1);

namespace App\Model;

/**
 * @property int            $id
 * @property string         $originName     视频原始名字
 * @property string         $storedName     存储名字
 * @property string         $ext            文件后缀名
 * @property int            $size           文件大小
 * @property int            $type           文件原始编码类型
 * @property string         $originUrl      原文件链接
 * @property string         $posterUrl      海报/封面链接
 * @property string         $m3u8Url        视频播放地址
 * @property string         $avCode         番号或视频标识
 * @property string         $posterThumbUrl 海报/封面缩略图地址
 * @property int            $duration       视频长度秒
 * @property int            $state          状态
 * @property int            $uploadId       上传日志ID
 * @property \Carbon\Carbon $createdAt      创建时间
 * @property \Carbon\Carbon $updatedAt      更新时间
 * @property string         $deletedAt      删除时间
 */
final class LongVideo extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'long_video';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [
        'id',
        'origin_name',
        'stored_name',
        'ext',
        'size',
        'type',
        'origin_url',
        'poster_url',
        'm3u8_url',
        'av_code',
        'poster_thumb_url',
        'duration',
        'state',
        'upload_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = [
        'id'         => 'integer',
        'size'       => 'integer',
        'type'       => 'integer',
        'duration'   => 'integer',
        'state'      => 'integer',
        'upload_id'  => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
