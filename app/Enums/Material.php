<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Material enum.
 *
 * @method static self PLASTIC()
 * @method static self METAL()
 * @method static self RESIN()
 * @method static self MIXED()
 */
class Material extends Enum
{
    const PLASTIC = 'plastic';
    const METAL = 'metal';
    const RESIN = 'resin';
    const MIXED = 'mixed';

    public static function getValues(): array
    {
        return [
            self::PLASTIC,
            self::METAL,
            self::RESIN,
            self::MIXED,
        ];
    }

    public static function getLabels(): array
    {
        return [
            self::PLASTIC => 'Plastic',
            self::METAL => 'Metal',
            self::RESIN => 'Resin',
            self::MIXED => 'Mixed',
        ];
    }

    public static function getDescriptions(): array
    {
        return [
            self::PLASTIC => 'The model is made of plastic.',
            self::METAL => 'The model is made of metal.',
            self::RESIN => 'The model is made of resin.',
            self::MIXED => 'The model is made of a mix of materials.',
        ];
    }


}
