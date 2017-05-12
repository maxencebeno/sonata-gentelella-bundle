<?php

namespace Sherlockode\SonataGentellelaBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class SherlockodeSonataGentellelaExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
    }

    public function prepend(ContainerBuilder $container)
    {
        $bundleConfiguration = $container->getExtensionConfig('sherlockode_sonata_gentellela')[0];

        $bundles = $container->getParameter('kernel.bundles');
        if (isset($bundles['SonataAdminBundle'])) {
            $config = [
                'templates' => [
                    'user_block'                 => 'SherlockodeSonataGentellelaBundle:Core:user_block.html.twig',
                    'add_block'                  => 'SherlockodeSonataGentellelaBundle:Core:add_block.html.twig',
                    'layout'                     => 'SherlockodeSonataGentellelaBundle::standard_layout.html.twig',
                    'ajax'                       => 'SherlockodeSonataGentellelaBundle::ajax_layout.html.twig',
                    'dashboard'                  => 'SherlockodeSonataGentellelaBundle:Core:dashboard.html.twig',
                    'search'                     => 'SherlockodeSonataGentellelaBundle:Core:search.html.twig',
                    'list'                       => 'SherlockodeSonataGentellelaBundle:CRUD:list.html.twig',
                    'filter'                     => 'SherlockodeSonataGentellelaBundle:Form:filter_admin_fields.html.twig',
                    'show'                       => 'SherlockodeSonataGentellelaBundle:CRUD:show.html.twig',
                    'show_compare'               => 'SherlockodeSonataGentellelaBundle:CRUD:show_compare.html.twig',
                    'edit'                       => 'SherlockodeSonataGentellelaBundle:CRUD:edit.html.twig',
                    'preview'                    => 'SherlockodeSonataGentellelaBundle:CRUD:preview.html.twig',
                    'history'                    => 'SherlockodeSonataGentellelaBundle:CRUD:history.html.twig',
                    'acl'                        => 'SherlockodeSonataGentellelaBundle:CRUD:acl.html.twig',
                    'history_revision_timestamp' => 'SherlockodeSonataGentellelaBundle:CRUD:history_revision_timestamp.html.twig',
                    'action'                     => 'SherlockodeSonataGentellelaBundle:CRUD:action.html.twig',
                    'select'                     => 'SherlockodeSonataGentellelaBundle:CRUD:list__select.html.twig',
                    'list_block'                 => 'SherlockodeSonataGentellelaBundle:Block:block_admin_list.html.twig',
                    'search_result_block'        => 'SherlockodeSonataGentellelaBundle:Block:block_search_result.html.twig',
                    'short_object_description'   => 'SherlockodeSonataGentellelaBundle:Helper:short-object-description.html.twig',
                    'delete'                     => 'SherlockodeSonataGentellelaBundle:CRUD:delete.html.twig',
                    'batch'                      => 'SherlockodeSonataGentellelaBundle:CRUD:list__batch.html.twig',
                    'batch_confirmation'         => 'SherlockodeSonataGentellelaBundle:CRUD:batch_confirmation.html.twig',
                    'inner_list_row'             => 'SherlockodeSonataGentellelaBundle:CRUD:list_inner_row.html.twig',
                    'outer_list_rows_mosaic'     => 'SherlockodeSonataGentellelaBundle:CRUD:list_outer_rows_mosaic.html.twig',
                    'outer_list_rows_list'       => 'SherlockodeSonataGentellelaBundle:CRUD:list_outer_rows_list.html.twig',
                    'outer_list_rows_tree'       => 'SherlockodeSonataGentellelaBundle:CRUD:list_outer_rows_tree.html.twig',
                    'base_list_field'            => 'SherlockodeSonataGentellelaBundle:CRUD:base_list_field.html.twig',
                    'pager_links'                => 'SherlockodeSonataGentellelaBundle:Pager:links.html.twig',
                    'pager_results'              => 'SherlockodeSonataGentellelaBundle:Pager:results.html.twig',
                    'tab_menu_template'          => 'SherlockodeSonataGentellelaBundle:Core:tab_menu_template.html.twig',
                    'knp_menu_template'          => 'SherlockodeSonataGentellelaBundle:Menu:sonata_menu.html.twig',
                ],
                'assets'    => [
                    'stylesheets' => [
                        'bundles/sherlockodesonatagentellela/css/bootstrap.min.css',
                        'bundles/sherlockodesonatagentellela/css/font-awesome.min.css',
                        'bundles/sherlockodesonatagentellela/css/icheck.css',
                        'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
                        'bundles/sonatacore/vendor/select2/select2.css',
                        'bundles/sonatacore/vendor/select2-bootstrap-css/select2-bootstrap.min.css',
                        'bundles/sherlockodesonatagentellela/css/prettify.min.css',
                        'bundles/sherlockodesonatagentellela/css/custom.min.css',
                        'bundles/sherlockodesonatagentellela/css/sonata-gentellela.css',
                        'bundles/sherlockodesonatagentellela/css/custom.min.css',

                    ],
                    'javascripts' => [
//                        'bundles/sherlockodesonatagentellela/js/jquery.min.js',
                        /* JQuery has been moved in header. This is bad, but necessary until https://github.com/sonata-project/SonataAdminBundle/pull/3647 complete.
                         * This will be cleaned up with the version 4.0 of sonata admin */

                        'bundles/sonataadmin/vendor/jquery.scrollTo/jquery.scrollTo.min.js',
                        'bundles/sherlockodesonatagentellela/js/moment.min.js',
                        'bundles/sherlockodesonatagentellela/js/bootstrap.min.js',
                        'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
                        'bundles/sonataadmin/vendor/jqueryui/ui/minified/jquery-ui.min.js',
                        'bundles/sonataadmin/vendor/jqueryui/ui/minified/i18n/jquery-ui-i18n.min.js',
                        'bundles/sonataadmin/vendor/jquery-form/jquery.form.js',
                        'bundles/sonataadmin/jquery/jquery.confirmExit.js',
                        'bundles/sonataadmin/vendor/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js',
                        'bundles/sonatacore/vendor/select2/select2.min.js',
                        'bundles/sonataadmin/vendor/iCheck/icheck.min.js',
                        'bundles/sonataadmin/vendor/slimScroll/jquery.slimscroll.min.js',
                        'bundles/sonataadmin/vendor/waypoints/lib/jquery.waypoints.min.js',
                        'bundles/sonataadmin/vendor/waypoints/lib/shortcuts/sticky.min.js',
                        'bundles/sonataadmin/vendor/readmore-js/readmore.min.js',
                        'bundles/sonataadmin/Admin.js',
                        'bundles/sonataadmin/treeview.js',
                    ],
                ],
            ];

            if (!empty($bundleConfiguration['fast_click'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/fastclick.js';
            }

            if (!empty($bundleConfiguration['nprogress'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/nprogress.js';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/nprogress.css';
            }

            if (!empty($bundleConfiguration['chart'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/Chart.min.js';
            }

            if (!empty($bundleConfiguration['gauge'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/gauge.min.js';
            }

            if (!empty($bundleConfiguration['bootstrap_progressbar'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/bootstrap-progressbar.min.js';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/bootstrap-progressbar-3.3.4.min.css';
            }

            if (!empty($bundleConfiguration['skycons'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/skycons.js';
            }

            if (!empty($bundleConfiguration['flot'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.flot.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.flot.pie.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.flot.time.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.flot.stack.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.flot.resize.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.flot.orderBars.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.flot.spline.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/curvedLines.js';
            }

            if (!empty($bundleConfiguration['datejs'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/date.js';
            }

            if (!empty($bundleConfiguration['jqvmap'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.vmap.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.vmap.world.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.vmap.sampledata.js';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/jqvmap.min.css';
            }

            if (!empty($bundleConfiguration['bootstrap_daterangerpicker'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/moment.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/daterangepicker.js';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/daterangepicker.css';
            }

            if (!empty($bundleConfiguration['calendar'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/fullcalendar.min.js';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/fullcalendar.min.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/fullcalendar.print.css';
            }

            if (!empty($bundleConfiguration['echarts'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/echarts.min.js';
            }

            if (!empty($bundleConfiguration['select2'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/select2.full.min.js';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/select2.min.css';
            }

            if (!empty($bundleConfiguration['switchery'])) {
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/switchery.min.css';
            }

            if (!empty($bundleConfiguration['starrr'])) {
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/starrr.css';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/starrr.js';
            }

            if (!empty($bundleConfiguration['parsley'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/parsley.min.js';
            }

            if (!empty($bundleConfiguration['autosize'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/autosize.min.js';
            }

            if (!empty($bundleConfiguration['jquery_autocomplete'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.autocomplete.min.js';
            }

            if (!empty($bundleConfiguration['jquery_tag_input'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.tagsinput.js';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/jquery.tagsinput.css';
            }

            if (!empty($bundleConfiguration['bootstrap_wysiwyg'])) {
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/prettify.min.css';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/bootstrap-wysiwyg.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.hotkeys.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/prettify.js';
            }

            if (!empty($bundleConfiguration['ion_rangeslider'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/ion.rangeSlider.min.js';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/normalize.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/ion.rangeSlider.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/ion.rangeSlider.skinFlat.css';
            }

            if (!empty($bundleConfiguration['bootstrap_colorpicker'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/bootstrap-colorpicker.min.js';
            }

            if (!empty($bundleConfiguration['cropper'])) {
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/cropper.min.css';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/cropper.min.js';
            }

            if (!empty($bundleConfiguration['jquery_inputmask'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.inputmask.bundle.min.js';
            }

            if (!empty($bundleConfiguration['jquery_knob'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.knob.min.js';
            }

            if (!empty($bundleConfiguration['dropzone'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/dropzone.min.js';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/dropzone.min.css';
            }

            if (!empty($bundleConfiguration['validator'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/validator.js';
            }

            if (!empty($bundleConfiguration['jquery_smart_wizard'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.smartWizard.js';
            }

            if (!empty($bundleConfiguration['pnotify'])) {
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/pnotify.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/pnotify.buttons.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/pnotify.nonblock.css';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/pnotify.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/pnotify.buttons.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/pnotify.nonblock.js';
            }

            if (!empty($bundleConfiguration['jquery_sparklines'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.sparkline.min.js';
            }

            if (!empty($bundleConfiguration['morris'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/raphael.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/morris.min.js';
            }

            if (!empty($bundleConfiguration['animate'])) {
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/animate.min.css';
            }

            if (!empty($bundleConfiguration['easy_pie_chart'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.easypiechart.min.js';
            }

            if (!empty($bundleConfiguration['echarts'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/echarts.min.js';
            }

            if (!empty($bundleConfiguration['datatables'])) {
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/dataTables.bootstrap.min.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/buttons.bootstrap.min.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/fixedHeader.bootstrap.min.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/responsive.bootstrap.min.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatagentellela/css/scroller.bootstrap.min.css';

                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jquery.dataTables.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/dataTables.bootstrap.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/dataTables.buttons.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/buttons.bootstrap.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/buttons.flash.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/buttons.html5.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/buttons.print.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/dataTables.fixedHeader.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/dataTables.keyTable.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/dataTables.responsive.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/responsive.bootstrap.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/dataTables.scroller.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/jszip.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/pdfmake.min.js';
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/vfs_fonts.js';
            }

            if (!empty($bundleConfiguration['demo'])) {
                $config['assets']['javascripts'][] = 'bundles/sherlockodesonatagentellela/js/custom.js';
            }

            $container->prependExtensionConfig('sonata_admin', $config);
        }
    }
}
