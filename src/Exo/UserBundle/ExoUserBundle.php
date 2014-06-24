<?php

namespace Exo\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ExoUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
