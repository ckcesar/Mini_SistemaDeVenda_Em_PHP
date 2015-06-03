<?php
 session_start();
?>

<table class="tabela_lista" >
    <thead>
        <tr class="tr_th_lista">
            <th>Cliente</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Total</th>

            <th colspan="2">Ação</th>
        </tr>
    </thead>

    <?php

      if($_SESSION['itensVenda']){
          foreach($_SESSION['itensVenda'] as $indice=>$itens): ?>

              <tr class="tr_lista">

                  <td><?php echo $itens['cliente']; ?></td>
                  <td><?php echo $itens['produto'];?></td>
                  <td><?php echo $itens['preco'];?></td>
                  <td><?php echo $itens['quant'];?></td>
                  <td><?php echo $itens['preco']*$itens['quant'];?></td>

                  <td class="del"><a href="#" onclick="deletar('<?=$indice;?>');">Excluir</a></td>
              </tr>

         <?php endforeach;
      }

    ?>

</table>