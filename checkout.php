<?php
include_once ("includes/body.inc.php");
top(CARRINHO);
?>
    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Checkout</h1>
          </div>
        </div>
      </div>
    </div>

<table class="table caption-top">
    <thead>
    <tr>
        <th scope="col">Produtos</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">Quantidade</th>
        <th scope="col">Valor</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row"><img src="assets/images/SAMSUNGZFOLD2.jpg   " alt="" class="img-fluid wc-image"></th>
        <td>Smartphone SAMSUNG Galaxy Z Fold2 5G (7.6'' - 12 GB - 256 GB)</td>
        <td>
            <button type="button" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                </svg>
            </button>
        </td>
        <td><select class="form-control">
                <option value="0">1</option>
                <option value="0">2</option>
                <option value="0">3</option>
                <option value="0">4</option>
                <option value="0">5</option>
                <option value="0">6</option>
                <option value="0">7</option>
            </select>
        </td>
        <td>$1999</td>
    </tr>
    </tbody>
</table>


    <div class="callback-form contact-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="contact-form">
              <form action="#" id="contact">
                 <div class="row">



                 </div>
                 <div class="row">
                      <div class="col-sm-6 col-xs-12">
                           <div class="form-group">
                                <input type="text" class="form-control" placeholder="Morada 1:">
                           </div>
                      </div>
                 </div>
                 <div class="row">
                      <div class="col-sm-6 col-xs-12">
                           <div class="form-group">
                                <input type="text" class="form-control" placeholder="Cidade:">
                           </div>
                      </div>
                     <div class="form-group">
                         <input type="text" class="form-control" placeholder="Telemovel:">
                     </div>
                 </div>
                 <div class="row">
                      <div class="col-sm-6 col-xs-12">
                           <div class="form-group">
                                <input type="text" class="form-control" placeholder="Zip:">
                           </div>
                      </div>
                      <div class="col-sm-6 col-xs-12">
                           <div class="form-group">
                                <select class="form-control">
                                         <option value="">-- Escolhe pais --</option>
                                     <option value="">-- Portugal --</option>
                                     <option value="">-- Inglaterra --</option>
                                     <option value="">-- França --</option>
                                </select>
                           </div>
                      </div>
                 </div>

                 <div class="row">
                      <div class="col-sm-6 col-xs-12">
                           <div class="form-group">
                                <select class="form-control">
                                     <option value="">-- Escolhe o metodo de pagamento --</option>
                                     <option value="banco">Conta multibanco</option>
                                     <option value="paypal">PayPal</option>
                                </select>
                           </div>
                      </div>


                 </div>

                 <div class="row">
                   <div class="col-lg-12">
                      <button type="submit" id="form-submit" class="filled-button">Comprar</button>
                  </div>
                 </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Starts Here -->

<?php
bot();
?>

  </body>
</html>