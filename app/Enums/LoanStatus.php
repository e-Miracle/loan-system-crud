<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Pending()
 * @method static static Approved()
 * @method static static Rejected()
 */
final class LoanStatus extends Enum
{
    const Pending = 'pending';
    const Approved = 'approved';
    const Rejected = 'rejected';
}
