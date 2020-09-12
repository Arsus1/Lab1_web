<table>
    <tr>
        <th>X</th>
        <th>Y</th>
        <th>R</th>
        <th>Current time</th>
        <th>Script time</th>
        <th>Result</th>
    </tr>
    <?php foreach ($_SESSION['history'] as $value) { ?>
        <tr>
            <td><?php echo $value[0] ?></td>
            <td><?php echo $value[1] ?></td>
            <td><?php echo $value[2] ?></td>
            <td><?php echo $value[3] ?></td>
            <td><?php echo number_format($value[4], 10, ".", "")*1000000 ?></td>
            <td><?php echo $value[5] ?></td>
        </tr>
    <?php }?>
</table>
