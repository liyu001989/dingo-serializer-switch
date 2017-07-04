<?php

/*
 * This file is part of the League\Fractal package.
 *
 * (c) Phil Sturgeon <me@philsturgeon.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Liyu\Dingo\Serializers;

use League\Fractal\Serializer\ArraySerializer as BaseSerializer;

class ArraySerializer extends BaseSerializer
{
    /**
     * Serialize null resource.
     *
     * @return array
     */
    public function null()
    {
        return null;
    }
}
