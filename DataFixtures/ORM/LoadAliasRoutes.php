<?php
/**
 * This file is part of the Clastic package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clastic\BlogBundle\DataFixtures\ORM;

use Clastic\AliasBundle\Entity\AliasPattern;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class LoadAliasRoutes extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        if (!class_exists('\Clastic\AliasBundle\Entity\AliasPattern')) {
            return;
        }

        $aliasBlogPattern = new AliasPattern();
        $aliasBlogPattern->setModuleIdentifier('blog');
        $aliasBlogPattern->setPattern('blog/{title}');
        $manager->persist($aliasBlogPattern);

        $aliasBlogCategoryPattern = new AliasPattern();
        $aliasBlogCategoryPattern->setModuleIdentifier('blog/category');
        $aliasBlogCategoryPattern->setPattern('blog/category/{title}');
        $manager->persist($aliasBlogCategoryPattern);

        $manager->flush();
    }

    function getOrder()
    {
        return -10;
    }
}
