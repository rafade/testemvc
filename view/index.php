<ul>
<?php foreach ($data["dados"] as $dado) : ?>
    <li>
        ID=<?php echo $dado['id'];?>
        | <a href="pessoa/?t=<?php echo $data['t'];?>&id=<?php echo $dado['id'];?>">
            <strong><?php echo $dado['nome'];?></strong></a>
        - <a href="excluir/?t=<?php echo $data['t'];?>&id=<?php echo $dado['id'];?>" 
            onclick="return confirm('Tem certeza ?')">Excluir</a>
    </li>
<?php endforeach; ?>
</ul>
<a href="pessoa/?t=<?php echo $data['t'];?>">Novo <?php echo $data['t'];?></a>