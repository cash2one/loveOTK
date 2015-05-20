<?php

namespace User\OrderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TuoyundanForm extends AbstractType
{
    /**
 * @param FormBuilderInterface $builder
 * @param array $options
 */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('awbno')//单号
            ->add('pinming')//品名
            ->add('jianshu')//件数
            ->add('zhongliang')//重量
            ->add('tiji')//面积
            ->add('city')//目的城市
            ->add('xianlu')//线路
            ->add('fahuomingcheng')//发货方
            ->add('fahuoguhua')
            ->add('fahuoshouji')
            ->add('shouhoumingcheng')//收货方
            ->add('shouhouguhua')
            ->add('shouhoushouji')
            ->add('tihuodizhi') //提货地址
            ->add('tihuodianhua') //提货电话
            ->add('teshuyaoqiu')//特殊要求
            ->add('beizhu')//备注
            ->add('jiaojiefangshi', 'choice', array(
                    'choices' => array(
                        '自提' => '自提',
                        '送货' => '送货',
                    )
                )
            )
            ->add('jifeifangshi', 'choice', array(
                    'choices' => array(
                        '按吨数' => '按吨数',
                        '按件数' => '按件数',
                        '按体积' => '按体积',
                    )
                )
            )
            ->add('jibenyunfei')//基本运费
            ->add('tihuofei')//提货费
            ->add('songhuofei')//送货费
            ->add('zhongzhuanfei')//中转费
            ->add('daishouhuokuan')//代收货款
            ->add('qitafeiyong')//其他费用
            //合计运费 是计算出来的
            ->add('jiesuanfangshi', 'choice', array(
                    'choices' => array(
                        '到付' => '到付',
                        '现付' => '现付',
                        '回单结' => '回单结',
                        '月结' => '月结',
                        '多笔付' => '多笔付',
                    )
                )
            )
            ->add('xianfu')//现付
            ->add('daofu')//到付
            ->add('huidanfu')//回单付
            ->add('yuejie')//月结
            ->add('huikou')//回扣
            ->add('huidan')//回单
            ->add('fapiao', 'choice', array(
                    'choices' => array(
                        'false' => '不开票',
                        'true' => '开票',
                    )
                )
            )
            ->add('feiyongshuoming');//费用说明
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'User\OrderBundle\Entity\Tuoyundan'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tuoyundan';
    }
}
