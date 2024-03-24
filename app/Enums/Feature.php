<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Feature enum.
 *
 * @method static self PREMIUM_PAINT_QUALITY()
 * @method static self BATCH_PAINTED()
 * @method static self 3D_PRINTED()
 * @method static self RESTORED()
 * @method static self BRAND_NEW()
 * @method static self CUSTOM_PAINT_JOB()
 * @method static self DIORAMA()
 */
class Feature extends Enum
{
    const PREMIUM_PAINT_QUALITY = 'premium_paint_quality';
    const BATCH_PAINTED = 'batch_painted';
    const PRINTED = '3d_printed';
    const RESTORED = 'restored';
    const BRAND_NEW = 'brand_new';
    const CUSTOM_PAINT_JOB = 'custom_paint_job';
    const DIORAMA = 'diorama';
    const FULL_ARMY = 'full_army';

    public static function getValues(): array
    {
        return [
            self::PREMIUM_PAINT_QUALITY,
            self::BATCH_PAINTED,
            self::PRINTED,
            self::RESTORED,
            self::BRAND_NEW,
            self::CUSTOM_PAINT_JOB,
            self::DIORAMA,
            self::FULL_ARMY,
        ];
    }

    public static function getLabels(): array
    {
        return [
            self::PREMIUM_PAINT_QUALITY => 'Premium Paint Quality',
            self::BATCH_PAINTED => 'Batch Painted',
            self::PRINTED => '3D Printed',
            self::RESTORED => 'Restored',
            self::BRAND_NEW => 'Brand New',
            self::CUSTOM_PAINT_JOB => 'Custom Paint Job',
            self::DIORAMA => 'Diorama',
            self::FULL_ARMY => 'Full Army',
        ];
    }

    public static function getDescriptions(): array
    {
        return [
            self::PREMIUM_PAINT_QUALITY => 'The model has been painted to a high standard.',
            self::BATCH_PAINTED => 'The model has been batch painted.',
            self::PRINTED => 'The model has been 3D printed.',
            self::RESTORED => 'The model has been restored.',
            self::BRAND_NEW => 'The model is brand new.',
            self::CUSTOM_PAINT_JOB => 'The model has been painted to a custom specification.',
            self::DIORAMA => 'The model is part of a diorama.',
            self::FULL_ARMY => 'This product is a full army.',
        ];
    }

    public static function getIcons(): array
    {
        return [
            self::PREMIUM_PAINT_QUALITY => 'premium_paint_quality.png',
            self::BATCH_PAINTED => 'batch_painted.png',
            self::PRINTED => '3d_printed.png',
            self::RESTORED => 'restored.png',
            self::BRAND_NEW => 'brand_new.png',
            self::CUSTOM_PAINT_JOB => 'custom_paint_job.png',
            self::DIORAMA => 'diorama.png',
            self::FULL_ARMY => 'full_army.png',
        ];
    }

}
