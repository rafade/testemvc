<?php //var_dump($data);?>

<form method="POST">
    <input type="hidden" name="id" 
        value="<?php echo isset($data["dado"]["id"])?$data["dado"]["id"]:"";?>">
    <label>Nome: 
        <input type="text" name="nome" 
        value="<?php echo isset($data["dado"]["nome"])?$data["dado"]["nome"]:"";?>">
    </label>
    <?php if (isset($data["t"]) && $data["t"] == "pessoa") : ?>    
        <label>E-mail: 
            <input type="email" name="email"
            value="<?php echo isset($data["dado"]["email"])?$data["dado"]["email"]:"";?>">
        </label>
    <?php endif; ?>
    <input type="submit" value="Salvar">
</form>

<p><a href="/mvc/">Voltar</a></p>