<?php
/**
 * This file is part of the Clastic package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clastic\BlogBundle\Form\Module;

use Clastic\BackofficeBundle\Form\Type\EntityMultiSelectType;
use Clastic\BackofficeBundle\Form\Type\WysiwygType;
use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * NodeTypeExtension
 *
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class BlogFormExtension extends AbstractNodeTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->getTabHelper($builder)->findTab('general')
            ->add('introduction', WysiwygType::class, [
                'label' => 'blog.form.tab.general.field.introduction',
            ])
            ->add('body', WysiwygType::class, [
                'label' => 'blog.form.tab.general.field.body',
            ]);

        $this->getTabHelper($builder)
            ->createTab('category', 'blog.form.tab.category.label')
            ->add('categories', EntityMultiSelectType::class, [
                'label' => 'blog.form.tab.category.field.categories',
                'class' => 'ClasticBlogBundle:Category',
                'required' => false,
            ]);
    }
}
