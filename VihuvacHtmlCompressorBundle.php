<?php

/**
 * This file is part of the HtmlCompressorBundle package.
 *
 * (c) Víctor Hugo Valle Castillo <victouk@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Vihuvac\Bundle\HtmlCompressorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Vihuvac\Bundle\HtmlCompressorBundle\DependencyInjection\VihuvacHtmlCompressorExtension;

class VihuvacHtmlCompressorBundle extends Bundle
{
    public function __construct()
    {
        $this->extension = new VihuvacHtmlCompressorExtension;
    }
}
