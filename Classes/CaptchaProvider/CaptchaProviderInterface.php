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

/**
 * CaptchaProviderInterface
 */
interface CaptchaProviderInterface
{
    /**
     * Returns a human-readable name of the captchaProvider instance
     *
     * @return string
     */
    public function getName();

    /**
     * Returns false when the functionality is not available, true otherwise.
     *
     * @return bool
     */
    public function isAvailable();

    /**
     * Returns true, when the captcha provider supports more than one captcha
     * instance on one page. Otherwise false.
     *
     * @return bool
     */
    public function hasMultipleInstancesSupport();

    /**
     * Returns true when the value in $fieldValue is a valid captcha string,
     * false otherwise.
     *
     * @param string $fieldValue
     * @param \AawTeam\Minipoll\Domain\Model\Poll $poll
     * @return bool
     */
    public function validate($fieldValue, Poll $poll);

    /**
     * Returns an array containing variables, that will be assigned to the
     * templateVariableContainer while rendering CaptchaViewHelper.
     * Mandatory keys:
     * -
     *
     * @see \AawTeam\Minipoll\ViewHelpers\Form\CaptchaViewHelper::render()
     * @param Poll $poll
     * @return array
     */
    public function createCaptchaArray(Poll $poll);
}
