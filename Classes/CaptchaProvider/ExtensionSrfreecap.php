<?php
namespace AawTeam\Minipoll\CaptchaProvider;

/*
 * Copyright 2017 Agentur am Wasser | Maeder & Partner AG
 *
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use AawTeam\Minipoll\Domain\Model\Poll;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * ExtensionSrfreecap
 *
 * Captcha provider for the TYPO3 Extension 'sr_freecap'
 * @see https://typo3.org/extensions/repository/view/sr_freecap
 */
class ExtensionSrfreecap implements CaptchaProviderInterface
{
    /**
     * {@inheritDoc}
     * @see \AawTeam\Minipoll\CaptchaProvider\CaptchaProviderInterface::getName()
     */
    public function getName()
    {
        return 'TYPO3 Extension "sr_freecap"';
    }

    /**
     * {@inheritDoc}
     * @see \AawTeam\Minipoll\CaptchaProvider\CaptchaProviderInterface::isAvailable()
     */
    public function isAvailable()
    {
        return \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('sr_freecap');
    }

    /**
     * {@inheritDoc}
     * @see \AawTeam\Minipoll\CaptchaProvider\CaptchaProviderInterface::hasMultipleInstancesSupport()
     */
    public function hasMultipleInstancesSupport()
    {
        return false;
    }

    /**
     * {@inheritDoc}
     * @see \AawTeam\Minipoll\CaptchaProvider\CaptchaProviderInterface::validate()
     */
    public function validate($fieldValue, Poll $poll)
    {
        /** @var \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator $validator */
        $validator = GeneralUtility::makeInstance(\SJBR\SrFreecap\Validation\Validator\CaptchaValidator::class);
        $result = $validator->validate($fieldValue);
        return !$result->hasErrors();
    }

    /**
     * {@inheritDoc}
     * @see \AawTeam\Minipoll\CaptchaProvider\CaptchaProviderInterface::createCaptchaArray()
     */
    public function createCaptchaArray(Poll $poll)
    {
        return [];
    }
}
