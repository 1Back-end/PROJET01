<?php include("../include/menu.php"); ?>
<?php include("script_add.php"); ?>

<!-- Inclure jQuery, intl-tel-input et le fichier de styles CSS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
<link rel="stylesheet" href="style.css">

    <div class="mobile-menu-overlay"></div>

    <div class="main-container pb-5">

    <div class="col-md-12 col-sm-12">
    <div class="card-box p-3 mb-3 text-center">
     <h5 class="text-uppercase">AJOUter un administrateur</h5>
    </div>
    </div>

    <div class="col-sm-12 col-md-12">
    <?php
        if(isset($_POST["enregistrer"])) {
            if(!empty($succes )) {
                echo '<div id="success-message" class="alert alert-success text-center">' . $succes  . '</div>';
            }
            if(!empty($erreur)) {
                echo '<div id="error-message" class="alert alert-danger text-center">' . $erreur . '</div>';
            }
        }
    ?>
   </div>
    <div class="col-md-12 col-sm-12">
   
        <form action="" method="post"  enctype="multipart/form-data">
            <div class="row">
           
    <div class="col-md-4 col-sm-12">
    <div class="card-box p-3 mb-3 text-center">
        <!-- Balise img pour afficher l'image par défaut -->
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANsAAADmCAMAAABruQABAAAAjVBMVEX29vYAAAD+/v76+vr////BwcH19fXp6ent7e2FhYXx8fHq6uptbW2mpqbb29vY2NhPT09hYWHS0tIdHR3FxcWcnJy7u7uenp7i4uKOjo4+Pj4kJCTMzMx8fHxDQ0NpaWkyMjKvr69ZWVlkZGSIiIh1dXUYGBhBQUEMDAwsLCwaGhpLS0tUVFQ4ODgjIyNdlF54AAAOJklEQVR4nO1d2XKjOhBl1BjvG+MFJ3ZikjgT3yz//3nXBrx0SwK1EJhU+bxMTTkIHST1plbL8+6444477rjjjjso4IJbd8URAIQQQa/T77fP6Pc7nV4vSH8T4jdyPXTdh6g1Hzz8UeLjZ//vZdBdtkberyJ45NWfrV7UrCR87+LRYRB/Ab8Dr06rqxktLd6nwwO/RtM7dG88nzB5nfC4a/WaSu9AbN19tCSWYRp3/MbROxALu+/liGX0FkGjRg9ENN+6IJbgYzNuDDshWlNnxFI8xV4D6IHozf86ZpbgrX3jlQd+tKmCWILd+IbsQIwHlTE74vlWCw/80XOlzBJ2o1uMnYiMx+z7azrYbY7YDZ6nL59bjrLYtEXdzHpdg349Tldx2Ekt/jP8o3HcicJWvNp9/mfQysqrc+gAhoU9+uwu2qC38Y+u3IGoF7VWhUba30V9y84PC2zhbXfWM3RdjgyDsMgIfYnqmZgQ5Iv9yTDieiwH56HX2n3ktTqvw8kTrTxJMInblq4mCG+2y2n5YVT10OUO2nYelfKhDzZO/HmzoRPjH+2rB2sHzjOIUD94n/0Kh85f6l77PnfleIHfWWnZLXwn71C81dPZId+xy4DAYeUNdeb3ppp5Ce1vDbMFuJ4rwos1k/+pXwE5MVa/bF+NYhUw1OiE0PmiEwvliz7iyoSXCOZqcrHjReerjaxuUKXSEW21Of7m9KW+8hNORlWJrQzgr5VhmIHDyeIrjf5hDRYsgFIhTJy5BkKlTr869ZivfvRP8fbvnhtyQjXr6xi0FOqh2zvRBaCgtq/ccL2GCBWqfN8uT041aoOg3iAG9F6rGDkVtWHF4lEGCIUl+9gpR85XiJF17dSOHZnJHdmWmj6+7K3ta3LvKUS0l/ryWYKbL0uoSc1L7QII5KDK1Po7K9y1Z8uAwWnnPvvHMuogr/2N5fpQmMddi+90IORFreFm+m//+PO4fXruDmdtO39PyPbR0mrkxFpqaMVvCEQ7fpXV03a36FjQE/Iimdl87kimxp0AIIJYH3l8WfA32RRGe8T+RBBIYolL7TBkRYH1bsSNssjk9gGvhcPof5WlJtomW3M7rkqRZfcrs2NyC11eCxDoo1UYbz0eO/+NtjBkNSAkK2DH7EDLZIcmxQczMie7XGPGxIY+ffqFRQ16vP3UV543Jmg6FWfJCZp38M2yRpQ+SS7eWcErCGg0cWP8uIjJox8sX0kTN8oHy7eANn18ZthB+UnOfFbZ1yZgySoIydMfhrNSms4xZ8IoIxAmGLDeEpOnd0afRjIjeV/UPndhwJodVFiuTZ4OiPR+YomRvO3BIvD0DJEnW4NuSrY2x15TBzKN8caYITAiD88Lv4xkIi8YH1PYSMhrcFa29LJCYe4T1Wa2RlOA7BVxETImCZV5g4Ku0u6Zytbk2U5upoERfnqc9/E+jHjCf26qE4/wTTPL8/DMmCdUEXzmzmho4b8uGua8N1mCtb6JI5Y7EkASfhjRTWmGWIK1Cojge8jpLhC1zXGMrO0RCk68ibqZCz05gYftm/EWycKzBysAgg2NB22P6WozMmMyCNsjDzKeObOFzLSWrss+Tjh6qVe1XTDifFM81Z40fabTivMKJ/L/BJa9QKIfmrlGpAFH/kvGXTlwXGGyGF6VE5oGSThLWhHMLoNis/eq22Q1KLtN4tEsVxGcUvvzw3Kr8MCpk09wAIez2qiALQ2OhCYD917cvynH2S7lkapgHrc6wMc2sEJ/E4+B8+U8MA+0muEv6+1Yx31J34WYZg+lok7lwfHjPIG3ZSRpQhIBYlbb2nRYa3AkJfXApe1GgZPCWPs+QpH9URK8GH0PPbslzwLO/OTt/YKcQVAWrAVH1SsR8US5sQLJ8s6IA7Ci9GRkyITGU1LvKihbdi9KmF/XE8jKx90nxHmbddSjdYIcL1PVhRg9jCSlmOt/K4TQ5BWXwpC3D44DGmhs8Jjmx4tkbm4N5RQsJUBF9bXnSXaleFPSvcV1BDPfmqyLztUvMfqFmbFRgXrjZyBhFXe1WrFXSnVfITeXPvcJLGvZo47/1Y6QQO4N95M1ghs+JfpzfppEBDhx8uZww7b+2TQhJ2MZ2w0ptyasNw9QeZGzCsHLjakBKpKT7JQ/TOIcERHoPBb7tEsT9Jt2wWGlrg3NarlVYZewHMiEGzYbMw1HwpfsMwVEO7oB+wt7AXo+i4lgt/mRn2p5ez8goYGi55kwwbKAn7ot5xE5AP/QBqaR6RAcvLTJSXZSBAnhP4tcZrTss6AEDgmwF7HT/akTJhZfGJnL3ykNvAj5E90TUiZqaVgk6+Nln4WXsQro5LegbNW9420xe4jVlVhXWBR82KTbuxcm/MR4uuGSqDLMl21xHSE0p9qtwXWz0l6gyH3ydbBCV+/NFbXq2uriegFpL9CeRyI38Bq0OXHjfo+Kb5V41NdKdhTw/hXbRk3hmBv7qEbCDaWlrmVuzNjZqVm3NchYe7aXTqBE6ZQbMpV5Mc8THE9Ku07guP9M5sYNKJzglJvVlCzmxtovvWrXpaS0kmfUoEzEEZ5PrA3LC0BT3cQKFmZfwg35agpulu2SqHspWJkPJtw4qRfXcGhT2kkSujXskJu7zVO+43/qQWXcHKX0sndarnpQxM12vTnzvj+sO1DIzVJOSk1bw3rYimWJpX47AkoWxU5gvdoM9JuVBZ5xcyEqbYWkhpsDezJrvLyOs4gBXV5fZHPZ+QEpHBgn1mLao3afgpul/5a1XjbgZREcvXo7Cr7OZP/Nypu/QF+e0gT7UrVR8OnmtRxTsK92ckTJVHp75ZpwQyHgUI4FPZUbN7kgAAOl1gNNoxzLMbw/JUvmADlkxgAvr1DxatRaGsPDkdOSJb3s47B/y5aBw+mAKQ+cdmJvdGXkbJdcGfGfvBhroDQjARu5FpF4DEuHoFW2NBY2i7LkUnygr3zhSkXlq2KUr9WGTeVMJpIctvKlxSwCQyVFZPJWFJ7MQpzYDrPYsSx4jQk1B2XosDWbfSxiv9tsD1Ew1dzSSYU91GTmzxAFV8YTOINVw8RJtWuSlHZSZVjpWUY+CYR5FN1NwWSc5XLeIsWG2D83dQpFZLbh+OSg/mfyPrTGz9uI5HCAxY53AsAF9gFMFt1K4Gesy8jivdvzuRWS9GQVVjh0qjXd4jHww6KhexjjVP7290vL7rYmYutdrCucqWDhwgkxektyZ/HaAaErSp6CFPsVibf1/jYSFhkYMWr58gM+HbfnppxeX9dAio2LYKlltyIF1fyzLnoa9rh18vDu5lUSPVlwrOOYAtbIl1+RKSVgocr5fRjSUujYVBvMmEsPtX51TIzY7ub1Ko8Xv9Go5JTWKTuWoBygYMNkKU07CGi9s8c5o8ghYXDtwAdo4pj63ochU6Uqb6XShEnp0Nlw3t10V8PFuCdf7CEiVVH217XprQvYhEUnzPAWv5HZdbx5QicGVYYGZMVelTex+Lqw7XZodkMhoMFBBaOIlCmOyYMf5WkvXuFs8PLSHEzqb+ZpMXI8r+j8G/jjghJj/82M1wr4s4LSgM9hUWMkBwSfAiDnF3KDaSDWBqcdBoZ3m+kud0D4muXOTDI0JG+LTMqc+O7hMxuG/efFSwW0l3JQfOaxI9tj1JPBpom2aA+IGSNIN8+vMwyiw0i//6dnB1jI0oMppOaY2okDETLTdzdjnQo+3s/LdM8/Q3VbRJJIZbBI1tKnyl0UkcU9pg/LNqnynV5r115yL1Q+YKq8k4GMi5zahNW3QpqIgnvfcuh14zDqB1kx86AfhTH7pugTNnJVXxI3UBTCIMEpWnUGHG1nl8eQKn9y1kkhB2lZHOqKqW47uQ0eQvTdTerlkCz/67AJBO6z5Muge232kA1NZXyVbsVf6sX5ofuCCeXweBk6WqtOHTUAbPqc5i0oCtvfHmc3kfROk8NBy5CkAwcdqWp7IzDJukdWm87Mx5tVadhZjCu5wdoB3pM4Ep1UOoNK8Xdy0fYG4XjlA1ltWkOYju9SaG60awoWgg6HvmAm0d8flZy2dImYLKM8/4VsVldxKN0tiLuVF39vpLg3R35aUa+4gQYjv6JABaW26kNRXBXKZWTdEoXVDyspbFQPivef5ItxfgnkGn/ywLktb1ofTHZorFJfbg+za5cqKG9XPQzz053WSq4Lprn/lrfA3BLm9/fJ96M1HD/mJx0rqUhSJVhXYfwuWclLvXd4DLF6MPPHXd3iUAu4NWpoffcGg39sW32NfANhk1fquI5AVeDcEnEF11VJqsDWsyuS0C9/T1HlsM2+dHrYvhrYn05qdFT5CJvLhM/kmh1hYF2WKMHqzsu6UPYsSIPVXPkDE40l5+IsSEPJuaDW0DXn5phLI8nFjqg1UBVwLvcrJNes0JebEzxnclFzwkN77jX0RYBeU/YJvsqeJ1aQgypKRPPRtT6NlAc/vjWvPy4FJIYYqQ4o1An5WIUzQFBFWXZzbFjHDrjQHsCoA07OpeZAtG+VdPLSr2w+ngA3Eikx90ScFUS/iose8jHoVD5oKUDMXJTiMsd+XYlS07CDOp26pepYWYUQ7brUwaau6XgB+GOLUx5sDEa1yBCZXVi1/Twd34RZxq7KsbvRmJ3ZiVFV664b1Sgcdez6c/ep6Nth7+bMjgDhtdxOzYHx2ecaAH57aV90DOMr7tx0mckAIUYr20NtF0yWt19lKhzoRfMyozeN2/KJ/cbgeNYytrKkHzezQHlkv0kA8CFcTjkFiR8HcdTgAcM4DJ8XteabSVFQ8+/TYD5rQ+MHjCApDQG99ihctxZxPESI40VrPY46nqZ2xO8AIAj831t37o477nCG/wHgytl5MmyReQAAAABJRU5ErkJggg==" id="profile-image" alt="Profile Avatar" style="cursor: pointer;">
        <h6 id="choose-image">Cliquez pour choisir une photo</h6>
        <!-- Input file caché pour le téléchargement de la nouvelle photo -->
        <input type="file" name="photo" value="<?php echo isset($_POST['photo']) ? htmlspecialchars($_POST['photo']) : ''; ?>"  id="upload-image"  style="display: none;" accept="image/*">
    </div>
</div>
            <div class="col-md-8 col-sm-12">    
            <div class="card-box p-3 mb-3">
               
                <div class="mb-3">
                        <input type="text" class="form-control" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>"  placeholder="Entrer le nom" name="nom">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Entrer le prénom" value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>"  name="prenom">
                    </div>
                  
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Entrer l'adresse email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" >
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Entrer la ville"  name="ville" value="<?php echo isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : ''; ?>">
                    </div>
                    <div class="mb-3">
                    <input type="tel" name="tel" id="phone" class="form-control" placeholder="Entrer le numéro de téléphone" value="<?php echo isset($_POST['tel']) ? htmlspecialchars($_POST['tel']) : ''; ?>">
                    
                </div>

                    
                    
                  
                    
                   
                  
                    <div class="mb-4 mt-3">
                       
                <button type="submit" name="enregistrer" class="btn-add mb-2 btn btn-success btn-sm btn-responsive">Enregistrer</button>
                <a href="#" onclick="history.back();" class="btn-add mb-2 btn btn-sm btn-responsive btn-danger">Annuler</a>

            </div>
                </div>

                
            </div>
           
        </form>
    </div>
</div>


</div>

<script src="script.js"></script>