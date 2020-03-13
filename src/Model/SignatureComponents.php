<?php

/*
 * This file is part of the SymfonyCasts BUNDLE_NAME_HERE package.
 * Copyright (c) SymfonyCasts <https://symfonycasts.com/>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SymfonyCasts\Bundle\VerifyUser\Model;

/**
 * @author Jesse Rushlow <jr@rushlow.dev>
 */
final class SignatureComponents
{
    /**
     * @var \DateTimeInterface
     */
    private $expiresAt;

    /**
     * @var string
     */
    private $token;

    public function __construct(\DateTimeInterface $expiresAt, string $token)
    {
        $this->expiresAt = $expiresAt;
        $this->token = $token;
    }

    /**
     * Returns Unix timestamp + hashed token as string.
     */
    public function getSignature(): string
    {
        $timestamp = $this->expiresAt->getTimestamp();

        return $timestamp.$this->token;
    }
}
