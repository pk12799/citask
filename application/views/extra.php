serverSide: true,
processing: true,
"ajax ": {
url: <? base_url('datatable') ?>,
type: 'Get',
data: <? base_url('datatable') ?>
}



<?php
// dd($type);
foreach ($sub as $tp) { ?>
    <tr class=''>
        <td scope='row '> <?php echo $tp->id;  ?></td>
        <td scope='row'><?php echo $tp->sub_name;  ?> </td>
        <td scope='row'><?php echo $tp->Prod_type;  ?> </td>
        <td scope="row"><a href="delsub?id=<?php echo $tp->id; ?>">delete</td>
    </tr>
<?php } ?>