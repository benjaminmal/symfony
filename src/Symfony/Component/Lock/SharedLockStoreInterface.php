<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Lock;

use Symfony\Component\Lock\Exception\LockConflictedException;
use Symfony\Component\Lock\Exception\NotSupportedException;

/**
 * @author Jérémy Derussé <jeremy@derusse.com>
 */
interface SharedLockStoreInterface extends PersistingStoreInterface
{
    /**
     * Stores the resource if it's not locked for reading by someone else.
     *
     * @throws NotSupportedException
     * @throws LockConflictedException
     */
    public function saveRead(Key $key);

    /**
     * Waits until a key becomes free for reading, then stores the resource.
     *
     * @throws LockConflictedException
     */
    public function waitAndSaveRead(Key $key);
}