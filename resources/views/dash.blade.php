<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add favicon -->
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">


    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}"/>
    
    <title>Sanhadja Voyage</title>
</head>
<body>

	<div class="container">
		<div class="navigation">
			<ul>
                <div class='img'>
				<img style="width:150px; height:80px; margin-top:-5px;margin-left:-5px;" src="../images/logoA.png" >
                </div>
                <li>
				<a href="{{ route('dash') }}">
					<span class="icon"><ion-icon name="home-outline"></ion-icon></span>
					<span class="title">Tableau de bord</span>
				</a>
		</li>

        <li>
				<a href="{{ route('calender') }}">
					<span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
					<span class="title">calendrier</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="people-outline"></ion-icon></span>
					<span class="title">Omra</span>
				</a>
		</li>
        <li>
				<a href="#">
					<span class="icon"><ion-icon name="chatbox-ellipses-outline"></ion-icon></span>
					<span class="title">Hotels</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="chatbox-ellipses-outline"></ion-icon></span>
					<span class="title">Voyage Organisé</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="help-circle-outline"></ion-icon></span>
					<span class="title">Visa</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
					<span class="title">Assurance</span>
				</a>
		</li>

		<li>
				<a href="#">
					<span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
					<span class="title">billet</span>
				</a>
		</li>
	<li>
				<a href="#">
					<span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
					<span class="title">Sign Out</span>
				</a>
		</li>

		</ul>
		</div>

<div class="main">
	<div class="topbar">
		<div class="toggle">
			<ion-icon name="menu-outline"></ion-icon>
		</div>
		<div class="search">
			<label for="">
				<input type="text" name="" id="" placeholder="search here">
			<ion-icon name="search-outline"></ion-icon>
			</label>
		</div>
		<div class="user">
			<img src="https://randomuser.me/api/portraits/men/79.jpg" alt="userimage">
		</div>
	</div>

<div class="details">
	<div class="recentOrders">
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>المعتمرين</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <ion-icon name="search-outline"></ion-icon>
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Customer <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Location <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Order Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Amount <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> <img src="images/Zinzu Chan Lee.jpg" alt="">Zinzu Chan Lee</td>
                        <td> Seoul </td>
                        <td> 17 Dec, 2022 </td>
                        <td>
                            <p class="status delivered">Delivered</p>
                        </td>
                        <td> <strong> $128.90 </strong></td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td><img src="images/Jeet Saru.png" alt=""> Jeet Saru </td>
                        <td> Kathmandu </td>
                        <td> 27 Aug, 2023 </td>
                        <td>
                            <p class="status cancelled">Cancelled</p>
                        </td>
                        <td> <strong>$5350.50</strong> </td>
                    </tr>
                    <tr>
                        <td> 3</td>
                        <td><img src="images/Sonal Gharti.jpg" alt=""> Sonal Gharti </td>
                        <td> Tokyo </td>
                        <td> 14 Mar, 2023 </td>
                        <td>
                            <p class="status shipped">Shipped</p>
                        </td>
                        <td> <strong>$210.40</strong> </td>
                    </tr>
                    <tr>
                        <td> 4</td>
                        <td><img src="images/Alson GC.jpg" alt=""> Alson GC </td>
                        <td> New Delhi </td>
                        <td> 25 May, 2023 </td>
                        <td>
                            <p class="status delivered">Delivered</p>
                        </td>
                        <td> <strong>$149.70</strong> </td>
                    </tr>
                    <tr>
                        <td> 5</td>
                        <td><img src="images/Sarita Limbu.jpg" alt=""> Sarita Limbu </td>
                        <td> Paris </td>
                        <td> 23 Apr, 2023 </td>
                        <td>
                            <p class="status pending">Pending</p>
                        </td>
                        <td> <strong>$399.99</strong> </td>
                    </tr>
                    <tr>
                        <td> 6</td>
                        <td><img src="images/Alex Gonley.jpg" alt=""> Alex Gonley </td>
                        <td> London </td>
                        <td> 23 Apr, 2023 </td>
                        <td>
                            <p class="status cancelled">Cancelled</p>
                        </td>
                        <td> <strong>$399.99</strong> </td>
                    </tr>
                    <tr>
                        <td> 7</td>
                        <td><img src="images/Alson GC.jpg" alt=""> Jeet Saru </td>
                        <td> New York </td>
                        <td> 20 May, 2023 </td>
                        <td>
                            <p class="status delivered">Delivered</p>
                        </td>
                        <td> <strong>$399.99</strong> </td>
                    </tr>
                    <tr>
                        <td> 8</td>
                        <td><img src="images/Sarita Limbu.jpg" alt=""> Aayat Ali Khan </td>
                        <td> Islamabad </td>
                        <td> 30 Feb, 2023 </td>
                        <td>
                            <p class="status pending">Pending</p>
                        </td>
                        <td> <strong>$149.70</strong> </td>
                    </tr>
                    <tr>
                        <td> 9</td>
                        <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                        <td> Dhaka </td>
                        <td> 22 Dec, 2023 </td>
                        <td>
                            <p class="status cancelled">Cancelled</p>
                        </td>
                        <td> <strong>$249.99</strong> </td>
                    </tr>
                    <tr>
                        <td> 9</td>
                        <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                        <td> Dhaka </td>
                        <td> 22 Dec, 2023 </td>
                        <td>
                            <p class="status cancelled">Cancelled</p>
                        </td>
                        <td> <strong>$249.99</strong> </td>
                    </tr>
                    <tr>
                        <td> 9</td>
                        <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                        <td> Dhaka </td>
                        <td> 22 Dec, 2023 </td>
                        <td>
                            <p class="status cancelled">Cancelled</p>
                        </td>
                        <td> <strong>$249.99</strong> </td>
                    </tr>
                    <tr>
                        <td> 9</td>
                        <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                        <td> Dhaka </td>
                        <td> 22 Dec, 2023 </td>
                        <td>
                            <p class="status cancelled">Cancelled</p>
                        </td>
                        <td> <strong>$249.99</strong> </td>
                    </tr>
                    <tr>
                        <td> 9</td>
                        <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                        <td> Dhaka </td>
                        <td> 22 Dec, 2023 </td>
                        <td>
                            <p class="status cancelled">Cancelled</p>
                        </td>
                        <td> <strong>$249.99</strong> </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
	</div>


	<div class="recentCustomers">
		<div class="cardHeader">
			<h2>Recent Customer</h2>
		</div>
		<table>
			<tr>
				<td width="60px">
					<div class="imgBox">
						<img src="https://randomuser.me/api/portraits/men/79.jpg"  alt="">
					</div>
					</td>
				<td>
					<h4>Rohit</h4><span>India</span>
				</td>
			</tr>
				<tr>
				<td width="60px">
					<div class="imgBox">
						<img src="https://randomuser.me/api/portraits/men/9.jpg"  alt="">
					</div>
					</td>
				<td>
					<h4>Rohit</h4><span>India</span>
				</td>
			</tr>
				<tr>
				<td width="60px">
					<div class="imgBox">
						<img src="https://randomuser.me/api/portraits/men/29.jpg"  alt="">
					</div>
					</td>
				<td>
					<h4>Rohit</h4><span>India</span>
				</td>
			</tr>
				<tr>
				<td width="60px">
					<div class="imgBox">
						<img src="https://randomuser.me/api/portraits/men/85.jpg"  alt="">
					</div>
					</td>
				<td>
					<h4>Rohit</h4><span>India</span>
				</td>
			</tr>
				<tr>
				<td width="60px">
					<div class="imgBox">
						<img src="https://randomuser.me/api/portraits/men/12.jpg"  alt="">
					</div>
					</td>
				<td>
					<h4>Rohit</h4><span>India</span>
				</td>
			</tr>
				<tr>
				<td width="60px">
					<div class="imgBox">
						<img src="https://randomuser.me/api/portraits/men/17.jpg"  alt="">
					</div>
					</td>
				<td>
					<h4>Rohit</h4><span>India</span>
				</td>
			</tr>
				<tr>
				<td width="60px">
					<div class="imgBox">
						<img src="https://randomuser.me/api/portraits/men/11.jpg"  alt="">
					</div>
					</td>
				<td>
					<h4>Rohit</h4><span>India</span>
				</td>
			</tr>
		</table>
	</div>
</div>


</div>
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


 <!-- Inclusion du fichier JavaScript -->
 <script src="{{ asset('js/dash.js') }}"></script>
  </body>
</html>
