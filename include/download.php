<div class="p-2">
  <table class="table table-bordered">
<thead class="thead-light">
<tr>
<th colspan="3" class="text-center" style="font-size:22px;text-decoration:underline;font-weight:normal;"><a href="<?=$row['downloadUrl'];?>"><?=$row['name'];?> скачать бесплатно</a></th>
</tr>
</thead>
<tbody>
<tr>
<td>Версия:</td>
<td><?=$row["version"];?></td>
</tr>
<tr>
<td>Разработчик:</td>
<td><?=$row["author"];?></td>
</tr>
<tr>
<td>Год релиза:</td>
<td><?=$row["year"];?></td>
</tr>
<tr>
<td>Поддерживаемые ОС:</td>
<td><?=$row["systems"];?></td>
</tr>
<tr>
<td>Языки интерфейса:</td>
<td><?=$row["language"];?></td>
</tr>
<tr>
<td>Размер файла:</td>
<td><?=$row["size"];?></td>
</tr>
</tbody>
</table>

</div>
