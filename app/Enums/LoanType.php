<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Days()
 * @method static static Months()
 * @method static static Year()
 */
final class LoanType extends Enum
{
    const Days = 'days';
    const Months = 'months';
    const Year = 'year';
}
