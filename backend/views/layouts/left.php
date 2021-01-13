<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->detail->Nama ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
       

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Utama', 'options' => ['class' => 'header']],
                    ['label' => 'Transaksi', 'icon' => ' fa-credit-card', 'url' => ['#'],
					'items' => [
						           	['label' => 'Kasir', 'icon' => 'fas fa-shopping-cart', 'url' => ['/transaksi/create'],],
						           	['label' => 'Daftar Transaksi', 'icon' => 'fas fa-money', 'url' => ['/transaksi'],],
						           	
						        ],
					],
					
					 ['label' => 'Barang', 'icon' => 'fas fa-cubes', 'url' => ['#'],
					'items' => [
						           	['label' => 'Daftar Barang', 'icon' => 'fas fa-cube', 'url' => ['/barang'],],
						           	['label' => 'Mutasi Barang', 'icon' => 'fas fa-exchange', 'url' => ['#'],],
						           	['label' => 'Permintaan Barang', 'icon' => 'fas  fa-upload', 'url' => ['/barang-request'],],
							        ['label' => 'Penerimaan Barang', 'icon' => 'fas   fa-download', 'url' => ['/barang-receipt'],],
						            ],
					],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                   
                ],
            ]
        ) ?>

    </section>

</aside>
