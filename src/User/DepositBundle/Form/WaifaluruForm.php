<?php

namespace User\DepositBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WaifaluruForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tuoyundanId')//托运单id
            ->add('dateZhongzhuan', 'date', array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => array('class' => 'date')))//中转时间
            ->add('chengyungongsi')//承运公司
            ->add('zhongzhuandan')//中转单号
            ->add('bendidianhua')//本地电话
            ->add('tihuodianhua')//提货电话
            ->add('lianxiren')//联系人
            ->add('lianxidizhi')//联系地址
            ->add('zhongliang')//重量
            ->add('tiji')//体积
            ->add('waifayuan')//外发员
            ->add('dateDaoda', 'date', array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => array('class' => 'date')))//中转时间
            ->add('yingfuyunfei')//应付运费
            ->add('yingfusonghuofei')//应付送货费
            ->add('yingfuqita') //应付其他/
            ->add('yufuyunfei')//预付运费
            ->add('zhongzhuanjiesuanfangshi', 'choice', array(
                    'choices' => array(
                        '现结' => '现结',
                        '欠款' => '欠款',
                        '回单结' => '回单结',
                    )
                )
            );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'User\DepositBundle\Entity\Waifaluru'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'waifaluru';
    }
}
