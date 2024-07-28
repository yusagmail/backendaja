<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MrpProjectProductItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>

<script src="https://code.jscharting.com/latest/jscharting.js"></script>
<script type="text/javascript" src="https://code.jscharting.com/latest/modules/types.js"></script>
<script type="text/javascript" src="https://code.jscharting.com/latest/modules/toolbar.js"></script>

<div id="chartDiv" style="max-width: 740px;height: 400px;margin: 0px auto;"></div>

    <script type="text/javascript">
      /*
Organization chart with direction option.
Learn how to:

  - Change organization chart layout direction.
*/
      // JS
      var chart = JSC.chart('chartDiv', {
        debug: true,
        type: 'organization down',
        legend_visible: false,
        series: [
          {
            line_color: '#747c72',
            defaultPoint: {
              label: {
                text: '<b>%name</b><br/>%pos',
                autoWrap: false
              },
              annotation: {
                padding: 9,
                corners: ['cut', 'square', 'cut', 'square'],
                margin: [15, 5, 10, 0]
              },
              outline: { color: '#73bc6e', width: 2 },
              color: '#dcead7',
              tooltip: '<b>%name</b><br/>%pos<br/>%phone'
            },
            points: [
              {
                name: 'Margret Swanson',
                id: 'ms',
                color: 'red',
                label_color: 'white',
                attributes: { pos: 'President', phone: '630-555-1111' }
              },
              {
                name: 'Mark Hudson',
                id: 'mh',
                parent: 'ms',
                attributes: {
                  pos: 'Vice President Marketing',
                  phone: '630-555-1111'
                }
              },
              {
                name: 'Chris Lysek',
                id: 'cl',
                parent: 'ms',
                attributes: {
                  pos: 'Vice President Sales',
                  phone: '630-555-2222'
                }
              },
              {
                name: 'Karyn Borbas',
                id: 'kb',
                parent: 'mh',
                attributes: {
                  pos: 'Marketing Manager',
                  phone: '312-555-3333'
                }
              },
              {
                name: 'Chris Rup',
                id: 'cr',
                parent: 'mh',
                attributes: {
                  pos: 'Marketing Manager',
                  phone: '773-555-4444'
                }
              },
              {
                name: 'Jenny Powers',
                id: 'jp',
                parent: 'cl',
                attributes: { pos: 'Sales Manager', phone: '630-555-5555' }
              },
              {
                name: 'Katie Swift',
                id: 'ks',
                parent: 'cl',
                attributes: { pos: 'Sales Manager', phone: '630-555-6666' }
              }
            ]
          }
        ],
        toolbar: {
          defaultItem: { margin: 5, events_click: orientChart },
          items: {
            Left_icon: 'system/default/zoom/arrow-left',
            Right_icon: 'system/default/zoom/arrow-right',
            Down_icon: 'system/default/zoom/arrow-down',
            Up_icon: 'system/default/zoom/arrow-up'
          }
        }
      });

      function orientChart(direction) {
        chart.options({ type: 'organization ' + direction });
      }
    </script>