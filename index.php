<?php
    session_start();
    include_once('src/conn/config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: src/acess/model/login.php');
    }
    $logado = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KG Agenda</title>

    <link rel="stylesheet" href="stylehome.css">
    <link rel="stylesheet" href="/libs/fontawesome/css/all.css">
    <link rel="icon" href="./img/Logo kg .png" type="image/x-icon">
</head>

<body>
    <div class="scroll-up-btn">
        <ion-icon name="chevron-up-outline"></ion-icon>
    </div>
    <div class="navbar">
        <div class="max-width">
            <div class="logo"><a href="#">KG<span>Agenda</span></a></div>
            <ul class="menu">
                <li>
                    <a href="#home">Inicio</a>
                </li>
                <li>
                    <a href="#about">Sobre</a>
                </li>
                <li>
                    <a href="#services">Serviços</a>
                </li>
                <li>
                    <a href="#skills">Especialidades</a>
                </li>
                <li>
                    <a href="#teams">Equipe</a>
                </li>
                <li>
                    <a href="#contact">Contato</a>
                </li>
                <li>
                    <a class="nav-link" href="src/definir-horarios/view/definir-horarios.html">Definir horários</a>
                </li>
                <li>
                    <a href="/src/acess/view/acesso.html">Entrar</a>
                </li>
                <li>
                    <a href="sair.php">Sair</a>
                </li>
            </ul>
            <div class=" menu-btn ">
                <ion-icon name="menu-outline "></ion-icon>
            </div>
        </div>
    </div>

    <!--home.inicio-->
    <section class="home " id="home ">
        <div class="max-width ">
            <div class="home-content ">
                <div class="text-1 ">Seja bem vindo a</div>
                <div class="text-2 ">KG Agenda</div>
                <div class="text-3 ">Faça seu <span class="typing "></span></div>
                <a href="# ">Agendar</a>
            </div>
        </div>
    </section>

    <!--sessão.sobre-->
    <section class="about " id="about ">
        <div class="max-width ">
            <h2 class="title ">Sobre</h2>
            <div class="about-content ">
                <div class="column left ">
                    <img src="img/Logo-escrita.png " alt=" ">
                </div>
                <div class="column right ">
                    <div class="text ">Somos a Clínica <span class="typing-2 "></span></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit culpa eveniet voluptatem modi minus! Odit, sed aspernatur? Ipsam, laudantium, expedita blanditiis magnam repellendus facilis est quidem, eveniet dolores adipisci harum
                        labore. Reiciendis exercitationem error nostrum unde totam, provident autem iure debitis odio aut sit illum pariatur dolorem dolor sed consectetur quibusdam repellat nobis, odit quis dignissimos nesciunt aperiam voluptatem. Soluta!
                    </p>
                    <a href="#teams ">Nosso pessoal</a>
                </div>
            </div>
        </div>
    </section>

    <!--sessão.serviços-->
    <section class="services " id="services ">
        <div class="max-width ">
            <h2 class="title ">Serviços</h2>
            <div class="serv-content ">
                <div class="card ">
                    <div class="box ">
                        <i class="fa-solid fa-tooth "></i>
                        <div class="text ">Implantes</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita neque, accusantium quo consequuntur quod dolor.</p>
                    </div>
                </div>

                <div class="card ">
                    <div class="box ">
                        <i class="fa-solid fa-teeth "></i>
                        <div class="text ">Aparelhos</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita neque, accusantium quo consequuntur quod dolor.</p>
                    </div>
                </div>

                <div class="card ">
                    <div class="box ">
                        <i class="fa-solid fa-tooth "></i>
                        <div class="text ">Limpezas</div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita neque, accusantium quo consequuntur quod dolor.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--sessão.especialidade-->
    <section class="skills " id="skills ">
        <div class="max-width ">
            <h2 class="title ">Especialidades</h2>
            <div class="skills-content ">
                <div class="column left ">
                    <div class="text ">Nossas Especialidades</div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure inventore ducimus enim maiores consectetur reprehenderit facere id labore quisquam voluptate natus at animi porro omnis atque eveniet repudiandae, beatae soluta laboriosam
                        doloremque voluptatem, nulla non exercitationem. Sint ipsam corporis quidem culpa dolorum quisquam, reiciendis impedit placeat atque fugiat hic aperiam commodi distinctio debitis autem nihil sed aliquid sit explicabo provident?</p>
                    <a href="# ">Mais informações</a>
                </div>
                <div class="column right ">
                    <div class="bars ">
                        <div class="info ">
                            <span>Odontopediatria</span>
                            <span>93%</span>
                        </div>
                        <div class="line html "></div>
                    </div>
                    <div class="bars ">
                        <div class="info ">
                            <span>Implantodontia</span>
                            <span>85%</span>
                        </div>
                        <div class="line css "></div>
                    </div>
                    <div class="bars ">
                        <div class="info ">
                            <span>Clareamento dentário</span>
                            <span>87%</span>
                        </div>
                        <div class="line js "></div>
                    </div>
                    <div class="bars ">
                        <div class="info ">
                            <span>Dentística</span>
                            <span>47%</span>
                        </div>
                        <div class="line php "></div>
                    </div>
                    <div class="bars ">
                        <div class="info ">
                            <span>Prótese dentária</span>
                            <span>42%</span>
                        </div>
                        <div class="line mysql "></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--sessão.equipe-->
    <section class="teams " id="teams ">
        <div class="max-width ">
            <h2 class="title ">Nossa Equipe</h2>
            <div class="carousel owl-carousel ">
                <div id="card-doutor1 " class="card ">
                    <div class="box ">
                        <img src="img/img-doutor.png " alt=" ">
                        <div class="text ">Beatriz Kakazu</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus commodi quia a voluptate ad explicabo.
                        </P>
                    </div>
                </div>
                <div id="card-doutor2 " class="card ">
                    <div class="box ">
                        <img src="img/img-doutor.png " alt=" ">
                        <div class="text ">Solange Pinheiro</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus commodi quia a voluptate ad explicabo.
                        </P>
                    </div>
                </div>
                <div id="card-doutor3 " class="card ">
                    <div class="box ">
                        <img src="img/img-doutor.png " alt=" ">
                        <div class="text ">Jéssica Gondo</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus commodi quia a voluptate ad explicabo.
                        </P>
                    </div>
                </div>
                <div id="card-doutor4 " class="card ">
                    <div class="box ">
                        <img src="img/img-doutor.png " alt=" ">
                        <div class="text ">Wilsson Rodrigues</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus commodi quia a voluptate ad explicabo.
                        </P>
                    </div>
                </div>
                <div id="card-doutor5 " class="card ">
                    <div class="box ">
                        <img src="img/img-doutor.png " alt=" ">
                        <div class="text ">Patricia Fernandes</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus commodi quia a voluptate ad explicabo.
                        </P>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--sessão.contato-->
    <section class="contact " id="contact ">
        <div class="max-width ">
            <h2 class="title ">Contato</h2>
            <div class="contact-content ">
                <div class="column left ">
                    <div class="text ">Fale Conosco</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi possimus molestiae, corporis illo, sequi, optio quaerat labore illum quis ipsam doloremque nisi magni. Quisquam reiciendis repellat ducimus quas! Distinctio, nemo veniam.
                        Iste quas facilis aperiam dolores similique, aliquam ex nesciunt suscipit aliquid, nam dolor vel fugit nulla ipsa incidunt rerum!
                    </p>
                    <div class="icons ">
                        <div class="row ">
                            <ion-icon name="earth-outline "></ion-icon>
                            <div class="info ">
                                <div class="head ">Endereço</div>
                                <div class="sub-title ">Lins, SP</div>
                            </div>
                        </div>
                        <div class="row ">
                            <ion-icon name="mail-outline "></ion-icon>
                            <div class="info ">
                                <div class="head ">Email</div>
                                <div class="sub-title ">kgagenda@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right ">
                    <div class="text ">Mensagem</div>
                    <form action="# ">
                        <div class="fields ">
                            <div class="field name ">
                                <input type="text " placeholder="Nome " required>
                            </div>
                            <div class="field email ">
                                <input type="email " placeholder="Email " required>
                            </div>
                        </div>
                        <div class="field ">
                            <div class="field ">
                                <input type="text " placeholder="Sobrenome " required>
                            </div>
                            <div class="field textarea ">
                                <textarea cols="30 " rows="10 " placeholder="Escrever... " required></textarea>
                            </div>
                            <div class="button ">
                                <button type="submit ">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--sessão footer-->
    <footer>
        <span>Criado por <a href="# ">IKMS</a> | Todos os direitos reservados 2022</span>
    </footer>

    <!--Modal para visualizar perfil do doutor-->
    <div id="modal-info " class="modal-container ">
        <div class="modal ">
            <h3 class="title ">Teste titulo</h3>
            <form>
                <div class="field ">
                    <div class="field ">
                        <input type="text " placeholder="Email " required>
                    </div>
                    <input type="button " class="button " value="cadastrar ">
                    <button class="fechar "><i class="fa-solid fa-arrow-left "></i></button>
            </form>
            </div>
        </div>
        <!--Fim do modal-->

        <script type="module " src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js "></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js "></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js "></script>
        <script src="script.js "></script>
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js "></script>
        <link rel="stylesheet " href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css " />

</body>

</html>