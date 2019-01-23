<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>Loja Virtual Test Shop</title>
        <link rel="stylesheet" type="text/css" media="screen" href="{{URL::asset('/css/stylesadmin.css')}}" />
        <script language="JavaScript" src="./js/main.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
            <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">                  
        <script language="JavaScript" src="./jquery/jquery-3.3.1.min.js"></script>
        <script language="JavaScript" src="./jquery/jquery-3.3.1.js"></script>
        <script>
            $(document).ready
            (
                function()
                {
                    $("#flip").click
                    (
                        function() 
                        {
                            $("#panel").slideToggle("slow");
                        }
                    );
                }
            );
            $(document).ready
            (
                function()
                {
                    $(".btform1").click
                    (
                        function() 
                        {
                            $("#panel").slideToggle("slow");
                        }
                    );
                }
            );   
            $(document).ready
            (
                function()
                {
                    $(".btform2").click
                    (
                        function() 
                        {
                            $("#panel1").slideToggle("slow");
                        }
                    );
                }
            );     
            $(document).ready
            (
                function()
                {
                    $(".btform3").click
                    (
                        function() 
                        {
                            $("#panel2").slideToggle("slow");
                        }
                    );
                }
            );                            
        </script>
    </head>
    <body>
        <div id="conteudoadmin">
            <div id="banner1">
                <a href="#"><h3 id="textright">Entrar</h3></a>
                <h2 id="fonttext">Loja Virtual</h2>
            </div>
            <div id="imagem1">
            </div>

   
            <div id="content">
                    <button class="tablink" onclick="openPage('cadastros', this, 'red')" id="defaultOpen">Cadastros</button>
                    <button class="tablink" onclick="openPage('pedidos', this, 'green')" >Pedidos</button>
                    <button class="tablink" onclick="openPage('relatorio', this, 'blue')">Relatórios</button>
                    <button class="tablink" onclick="openPage('financeiro', this, 'orange')">Financeiro</button>                
                    <div id="cadastros" class="tabcontent">
                        <div id="menucadastro">
                            <button class="btnop1" onclick="openCity(event, 'cadprodutos')" id="defaultTab">Produtos</button>
                            <button class="btnop1" onclick="openCity(event, 'caddepartamento')">Departamentos</button>
                            <button class="btnop1" onclick="openCity(event, 'cadfornecedor')">Fornecedores</button>
                            <button class="btnop1" onclick="openCity(event, 'cadunidade')">Unidade</button>
                        </div>
                        <div class="areacadastro">                          
                            <div id="cadprodutos" class="contentcad">                                      
                            </div>
                            <div id="caddepartamento" class="contentcad">
                                @yield('contentdepartamento')
                            </div>
                            <div id="cadfornecedor" class="contentcad">
                                @yield('contentfornecedor')
                            </div>                 
                            <div id="cadunidade" class="contentcad">
                                @yield('contentunidade');                               
                            </div>                 
                                                                           
                        </div>
                    </div>
                    
                    <div id="pedidos" class="tabcontent">
                        <h3>News</h3>
                        <p>Some news this fine day!</p> 
                    </div>
                    
                    <div id="relatorio" class="tabcontent">
                        <h3>Contact</h3>
                        <p>Get in touch, or swing by for a cup of coffee.</p>
                    </div>
                    
                    <div id="financeiro" class="tabcontent">
                        <h3>About</h3>
                        <p>Who we are and what we do.</p>
                    </div>                  
            </div>
                             
            <div id="footer"></div>
        </div>
        <script>
                function openPage(pageName,elmnt,color) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablink");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].style.backgroundColor = "";
                    }
                    document.getElementById(pageName).style.display = "block";
                    elmnt.style.backgroundColor = color;
                
                }
                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>        
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("contentcad");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("btnop1");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultTab").click();
        </script>            
    </body>
</html>