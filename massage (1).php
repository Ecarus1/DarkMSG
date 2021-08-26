<?php
    require "php/connectToBD.php";
    if(!isset($_SESSION["login"]))
    {
        exit("<meta http-equiv='refresh' content='0; url= index.php'>");
        // echo $_SESSION["login"];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Document</title>
        <link rel="stylesheet" href="style/massage.css">

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


        
    </head>


    <body>
        <!--Скрипты-->
        <script>
            var to_user_id, room_id;

            $(document).ready( function () {
                $("#search").keyup( function () {
                    var name = $('#search').val();
                    if (name === "") {
                        $("#display").html("");
                    }
                    else {
                        $.ajax({
                            type: "POST", 
                            url: "php/search.php", 
                            data: {
                                // В этом объекте, добавляем данные, которые хотим отправить на сервер
                                search: name // Присваиваем значение переменной 'name', свойству 'search'.
                            },
                            success: function(response) {
                                $("#search_box-result").html(response).show();
                            }
                        });
                    }
                });


                // $(".svg_go").click( function () {
                //     var textsms = $("#text_mes").val();
                //     var id_to_user = $("#search").val();
                //     if(textsms === "") {
                //         alert("Введите сообщение");
                //     }
                //     else {
                //         $.ajax({
                //             type: "POST",
                //             url: "php/action.php",
                //             data: {text_chat: textsms,
                //                     go_to_id_user: id_to_user}
                //         });
                //     }
                // });



                // $("#search").focusout( function () {
                //     $("#search_box-result").hide();
                // });

                // $("#search").focus( function () {
                //     $("#search_box-result").show();
                // });
                $(".list_user li").click( function () {
                    // $(".name_profile_to_user").show();
                    // $(".chat_user_to_user").show();
                    // alert(this.value);
                    alert("Я нажал");
                });




            });
            function fill(user_id, user_name) 
            {
                // Функция 'fill', является обработчиком события 'click'.
                // Она вызывается, когда пользователь кликает по элементу из результата поиска.
                $('#search').val(user_id); // Берем значение элемента из результата поиска и добавляем его в значение поля поиска
                $('#search_box-result').hide(); // Скрываем результаты поиска
                to_user_id = $("#search").val();
                room_id = null;

                // $.ajax({
                //     type: "POST",
                //     url: "php/.php",
                //     data: {to_user_id: to_user_id},
                //     success: function (res) {
                        $(".name_profile_to_user").html("<span>" + user_name + " #" + user_id + "</span>").show();
                        $(".chat_user_to_user").show();
                        $(".svg_go").show();
                        $("#text_message").show();
                //     }
                // });



            }

            function onChange()
            {
                var key = window.event.keyCode;
                if (key === 13) {
                    // document.getElementById("txtArea").value = document.getElementById("txtArea").value + "\n*";
                    //console.log("Нажал энтер");
                    var text_message = $("#text_message").val();
                    // $("textarea").val('');
                    //console.log(to_user_id, text_message);
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "php/sending_message.php",
                        data: {
                            text_message: text_message,
                            to_user_id: to_user_id,
                            room_id: room_id
                        },
                        beforeSend: function () {
                            $("#text_message").val('');
                        },
                        success: function (response) {
                            if (response.success && response.room_id) {
                                //location.href="?room="+response.room_id;
                                show_chat(response.room_id);
                            } else {
                                alert(response.error ? response.error : 'Произошла ошибка');
                            }
                        }
                    });
                }
            }
        </script>
        <!--       -->
        <!-- <div class="ggg"></div> -->
        <div class="conteiner">
            <div class="header">
                <svg class="svg_logo" viewBox="0 0 89 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.5 18C0.5 8.33503 8.33502 0.5 18 0.5H70.9952C80.6602 0.5 88.4952 8.33502 88.4952 18V61.9457C88.4952 64.6214 86.8287 67.014 84.3188 67.9416C82.1725 68.7348 80.5144 70.4773 79.8288 72.6604L77.3388 80.5885C76.0292 84.7584 70.5372 85.673 67.9468 82.1527C65.0079 78.1588 58.8276 78.9347 56.9671 83.5311L55.9324 86.0875C55.504 87.1459 54.7574 88.0451 53.7958 88.6608C50.8839 90.5253 46.9943 89.2786 45.7087 86.0688L42.8122 78.837C41.0384 74.4081 36.0165 72.2483 31.5815 74.007C30.1102 74.5904 28.827 75.5659 27.8713 76.8275L25.5169 79.9353C25.1863 80.3717 24.9451 80.869 24.8072 81.3988C24.0245 84.4061 19.8256 84.5935 18.7781 81.6679L17.1174 77.0299C15.7189 73.1239 10.181 73.1634 8.83832 77.089C7.79237 80.147 3.46531 80.141 2.42788 77.08L0.772115 72.1947C0.591921 71.663 0.5 71.1055 0.5 70.5441V66.7464V18Z" fill="#393939" stroke="black"/>
                    <circle cx="22.6939" cy="39.1579" r="16.6866" fill="#C4C4C4"/>
                    <circle cx="66.19" cy="39.1579" r="16.6866" fill="#C4C4C4"/>
                </svg>

                <svg class="svg_header" viewBox="0 0 1920 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50 1H1870C1897.06 1 1919 22.938 1919 50V95.7447C1919 98.4525 1918.55 101.142 1917.68 103.704L1916.26 107.865C1911.07 123.088 1891.77 127.69 1880.27 116.449C1870.36 106.768 1854.32 107.524 1845.36 118.095L1844.28 119.37C1834.79 130.572 1817.46 130.389 1808.21 118.991L1805.74 115.95C1801.11 110.242 1794.46 106.531 1787.17 105.583L1757.61 101.738C1743.93 99.9582 1730.11 103.797 1719.31 112.378L1706.46 122.587C1691.99 134.085 1672.27 136.459 1655.48 128.727L1634.96 119.274C1617.69 111.324 1597.44 113.633 1582.41 125.266L1578 128.677C1561.03 141.81 1537.49 142.374 1519.91 130.069L1501.95 117.494C1488.01 107.733 1470.11 105.572 1454.25 111.732L1415.47 126.787C1402.19 131.94 1387.34 131.064 1374.76 124.388L1361.62 117.411C1356.79 114.848 1351.58 113.077 1346.19 112.168L1331.61 109.71C1319.17 107.612 1306.4 110.199 1295.75 116.973L1278.65 127.854C1265.31 136.343 1248.69 137.873 1234.03 131.961L1182.43 111.164C1167.9 105.309 1151.5 106.452 1137.92 114.263L1071.84 152.294C1051.68 163.898 1026.14 159.725 1010.72 142.309L1001.34 131.721C987.953 116.602 966.906 110.807 947.666 116.941L928.448 123.069C916.638 126.834 903.84 125.984 892.632 120.688L870.546 110.254C855.453 103.124 837.826 103.831 823.352 112.147L777.997 138.208C764.175 146.149 747.354 146.871 732.902 140.142L690.495 120.397C672.687 112.106 651.699 114.779 636.538 127.27L614.563 145.376C595.858 160.787 568.696 160.208 550.664 144.014L525.622 121.524C512.079 109.361 493.079 105.338 475.769 110.969L432.058 125.189C424.422 127.673 416.292 128.242 408.384 126.847L272.941 102.945C258.503 100.397 243.667 104.186 232.219 113.344L212.91 128.792C196.491 141.927 173.522 143.122 155.828 131.763L135.911 118.977C117.672 107.268 93.6484 110.42 79.0477 126.437C59.0678 148.355 23.3422 143.55 9.86345 117.132L6.24 110.03C2.79572 103.279 1 95.8084 1 88.2297V50C1 22.938 22.938 1 50 1Z" fill="#1D1D1D" stroke="black" stroke-width="2"/>
                    <rect width="1920" height="100" fill="#1D1D1D"/>
                </svg>
            </div>
            <div class="search_box">
                <input type="text" id="search" placeholder="Поиск людей" />		
                <div id="search_box-result"></div>
            </div>
            <div class="nav_ponel">
                <a href="php/logout.php">Logout</a>
            </div>

            <div class="box_construct">
                <div class="dialogue_list">
                    <div class="dialogue_list_box">
                        <script>
                            setInterval(check_chat(), 5000);

                            function check_chat () {
                                $.ajax({
                                    type: "POST",
                                    url: "php/check_chat.php",
                                    success: function (chats) {
                                        $(".dialogue_list_box").html(chats)
                                    }
                                });
                            }

                            function show_chat (iroom_id) {
                                // console.log (to_id_user_show);
                                room_id = iroom_id;
                                to_user_id = to_user_id;

                                $.ajax({
                                    type: "POST",
                                    url: "php/show_room.php",
                                    data: {room_id: room_id},
                                    success: function (res) {
                                        $(".name_profile_to_user").html(res).show();
                                        $(".chat_user_to_user").show();
                                        $(".svg_go").show();
                                        $("#text_message").show();
                                    }
                                });
                            }
                        </script>
                    </div>

                </div>

                <div class="dialogue_massage">
                    <div class="name_profile_to_user">

                    </div>

                    <div class="chat_user_to_user">
                        <script>
                            
                        </script>
                    </div>
                </div>

            </div>

            <div class="chatix">
                <div class="profile">
                    <!-- <div class="avatar">

                    </div> -->

                    <svg height="95%" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="48.5" cy="48.5" r="48.5" fill="#C4C4C4"/>
                    </svg>


                        <span class="nickname">
                            <?php
                                echo $current_user['name'];
                            ?>
                        </span>

                    <svg class="svg_settings" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                        <path d="M41.6445 18.2287L41.4162 18.1473L40.5244 16.0187L40.6211 15.7999C43.3226 9.67312 43.1363 9.49036 42.6882 9.04617L39.0848 5.53086C38.9375 5.3847 38.6788 5.28189 38.4558 5.28189C38.253 5.28189 37.6389 5.28189 32.3169 7.69233L32.1035 7.78812L29.9078 6.90391L29.8196 6.68532C27.3169 0.488281 27.0605 0.488281 26.4378 0.488281H21.3489C20.7284 0.488281 20.4458 0.488281 18.1251 6.69609L18.0377 6.92208L15.8534 7.81253L15.6446 7.72569C12.0423 6.207 9.93897 5.43688 9.39068 5.43688C9.1682 5.43688 8.90859 5.5367 8.76062 5.68247L5.1538 9.20791C4.69625 9.65923 4.50648 9.84822 7.34941 15.8472L7.4539 16.0697L6.56073 18.196L6.34214 18.2805C0 20.7314 0 20.9704 0 21.6087V26.5955C0 27.2356 0 27.5014 6.35473 29.7788L6.58189 29.859L7.47519 31.9791L7.37926 32.1957C4.67782 38.3254 4.84916 38.4913 5.30905 38.9487L8.90704 42.4688C9.05787 42.6138 9.3189 42.7174 9.54151 42.7174C9.74296 42.7174 10.3556 42.7174 15.6812 40.3081L15.8944 40.2083L18.0916 41.0969L18.177 41.3167C20.6813 47.5116 20.9385 47.5116 21.5617 47.5116H26.6522C27.2913 47.5116 27.5564 47.5116 29.8789 41.2997L29.9655 41.0736L32.1533 40.1891L32.3615 40.274C35.9608 41.7969 38.0631 42.5655 38.6079 42.5655C38.8284 42.5655 39.0904 42.4688 39.2408 42.3198L42.8535 38.7867C43.3079 38.333 43.4973 38.1475 40.6493 32.1543L40.5434 31.9292L41.435 29.8121L41.6479 29.7287C48.0001 27.2649 48.0001 27.0248 48.0001 26.3856V21.4018C48 20.7619 48 20.4976 41.6445 18.2287ZM23.9999 32.0876C19.4519 32.0876 15.752 28.4584 15.752 24.0009C15.752 19.5432 19.452 15.9188 23.9999 15.9188C28.546 15.9188 32.2452 19.544 32.2452 24.0009C32.2454 28.4576 28.5461 32.0876 23.9999 32.0876Z" fill="#9C9C9C"/>
                        </g>
                        <defs>
                        <clipPath id="clip0">
                        <rect width="48" height="48" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                </div>

                <div class="text_massage">
                        <textarea name="" id="text_message" onkeypress="onChange();"></textarea>
                        
                        <svg class="svg_go" height="40%" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                            <path d="M47.0057 22.4419L2.43537 1.87099C1.72568 1.54871 0.878842 1.74071 0.385139 2.35098C-0.111991 2.96125 -0.129134 3.82866 0.343998 4.45607L15.0008 23.9985L0.343998 43.5408C-0.129134 44.1682 -0.111991 45.0391 0.381711 45.6459C0.714274 46.0608 1.2114 46.2836 1.71539 46.2836C1.95882 46.2836 2.20224 46.2322 2.43195 46.1259L47.0023 25.555C47.6126 25.2738 48 24.667 48 23.9985C48 23.3299 47.6126 22.7231 47.0057 22.4419Z" fill="#242424"/>
                            </g>
                            <defs>
                            <clipPath id="clip0">
                            <rect width="48" height="48" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                </div>
            </div>
        </div>
    </body>
</html>