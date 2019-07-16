<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_admin extends CI_Migration
{

    public $table = "tbl_admin";

    public function up()
    {
        $this->dbforge->add_field(array(
            'blog_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ),
            'blog_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'blog_description' => array(
                'type' => 'TEXT',
                'null' => true,
            ),
        ));
        $this->dbforge->add_key('blog_id', true);
        $this->dbforge->create_table("tbl_admin", true);

        $this->dbforge->add_field(
            array(
                "id_bank" => array(
                    "type" => "INT",
                    'constraint' => 11,
                    'auto_increment' => true,
                ),
                'nama_bank' => array(
                    'type' => 'varchar',
                    'constraint' => '200',
                ),
                'atas_nama' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
                'no_rekening' => array(
                    'type' => "varchar",
                    'constraint' => 25,
                    'null' => false,
                ),
            )
        );

        $this->dbforge->add_key("id_bank", true);
        $this->dbforge->create_table("tbl_bank_pembayaran", true);

        $this->dbforge->add_field(
            array(
                'id_carousell' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                    'null' => false,
                ),
                'sub_title' => array(
                    'type' => 'varchar',
                    'constraint' => 50,
                    'null' => false,
                    'default' => "0",
                ),
                'title' => array(
                    'type' => 'varchar',
                    'constraint' => '50',
                ),
                'content' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
                'img' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
            )
        );

        $this->dbforge->add_key('id_carousell', true);
        $this->dbforge->create_table("tbl_carousell", true);

        $this->dbforge->add_field(
            array(
                'id_detail_kategori' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                    'auto_increment' => true,
                ),
                'id_produk' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                ),
                'id_kategori' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                ),
            )
        );

        $this->dbforge->add_key('id_detail_kategori', true);
        $this->dbforge->create_table("tbl_detail_kategori", true);

        $this->dbforge->add_field(
            array(
                'id_detail_pesan' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                    'null' => false,
                ),
                'id_pesanan' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                ),
                'id_produk' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                ),
                'qty' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                ),
                'catatan_produk' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
            )
        );

        $this->dbforge->add_key('id_detail_pesan', true);
        $this->dbforge->create_table("tbl_detail_pesan", true);


        $this->dbforge->add_field(
            array(
                'id_konsumen' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                    'null' => false,
                    'unique' => true,
                ),
                'nama_konsumen' => array(
                    'type' => "varchar",
                    'constraint' => 200,
                    'null' => false,
                ),
                'email_konsumen' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
                'password_konsumen' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
                'no_hp_konsumen' => array(
                    'type' => "varchar",
                    'constraint' => 200,
                ),
                'tmp_forgot_password' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                    'unique' => true,
                ),
            )
        );

        $this->dbforge->add_key('id_konsumen', true);
        $this->dbforge->create_table("tbl_konsumen", true);

        $this->dbforge->add_field(
            array(
                'id_produk' => array(
                    'type' => "INT",
                    'constraint' => 11,
                    'auto_increment' => true,
                    'null' => false,
                ),
                'nama_produk' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
                'id_kategori' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                ),
                'stok_produk' => array(
                    'type' => 'ENUM("Tersedia", "Kosong")',
                    "null" => false,
                ),
                'deskripsi_produk' => array(
                    'type' => 'text',
                ),
                'harga_produk' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                ),
                'gambar_1' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
                'gambar_2' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
                'gambar_3' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
                'gambar_4' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
            )
        );

        $this->dbforge->add_key('id_produk', true);
        $this->dbforge->create_table("tbl_produk", true);

        $this->dbforge->add_field(
            array(
                'id_gambar_produk' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                    'null' => false,
                ),
                'id_produk' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                ),
                'path' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
                'CONSTRAINT FOREIGN KEY (id_produk) REFERENCES tbl_produk(id_produk)',
            )
        );

        $this->dbforge->add_key('id_gambar_produk', true);
        $this->dbforge->create_table("tbl_gambar_produk", true);

        $this->dbforge->add_field(
            array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                    'auto_increment' => true,
                ),
                'id_produk' => array(
                    'type' => "INT",
                    'constraint' => 11,
                ),
                'image' => array(
                    'type' => "varchar",
                    'constraint' => 200,
                ),
            )
        );

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table("tbl_produk_image", true);

        $this->dbforge->add_field(
            array(
                'id_kategori' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                    'null' => false,
                ),
                'nama_kategori' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 200,
                ),
            )
        );

        $this->dbforge->add_key('id_kategori', true);
        $this->dbforge->create_table("tbl_produk_kategori", true);

        $this->dbforge->add_field(
            array(
                'id' => array(
                    'type' => "INT",
                    'constraint' => 11,
                    'null' => false,
                    'auto_increment' => true,
                ),
                'setting' => array(
                    'type' => "varchar",
                    'constraint' => 20,
                    'null' => false,
                ),
                'value' => array(
                    'type' => 'text',
                ),
            )
        );

        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table("tbl_settings", true);

        $this->dbforge->add_field(
            array(
                'id_supplier' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                    'auto_increment' => true,
                ),
                'nama' => array(
                    'type' => 'varchar',
                    'constraint' => 50,
                    'null' => false,
                ),
                'alamat' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                    'null' => false,
                ),
                'telepon' => array(
                    'type' => 'varchar',
                    'constraint' => 50,
                ),
            )
        );

        $this->dbforge->add_key("id_supplier", true);
        $this->dbforge->create_table("tbl_supplier", true);

        $this->dbforge->add_field(
            array(
                'id_pesanan' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ),
                'id_konsumen' => array(
                    'type' => "INT",
                    'constraint' => 11,
                    'null' => false,
                ),
                'nama_penerima' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                    'null' => false,
                ),
                'no_hp_penerima' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                    'null' => false,
                ),
                'provinsi_penerima' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                    'null' => false,
                ),
                'kota_penerima' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                    'null' => false,
                ),
                'kode_pos' => array(
                    'type' => 'char',
                    'constraint' => 200,
                ),
                'alamat' => array(
                    'type' => 'text',
                    'null' => false,
                ),
                'jumlah_ongkir' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ),
                'jumlah_pesan' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ),
                'total_bayar' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ),
                'kode_unix' => array(
                    'type' => "INT",
                    'constraint' => 11,
                    'null' => false,
                ),
                'tanggal_pesan' => array(
                    'type' => 'date',
                    'null' => false,
                ),
                'status_pesanan' => array(
                    'type' => 'enum("Menunggu", "Konfirmasi", "Dikonfirmasi")',
                    'default' => "Menunggu",
                ),
                'kurir' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                    'null' => false,
                ),
                'id_bank' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                ),
                'bukti_transfer' => array(
                    'type' => "text",
                ),
                'resi_pengirimman' => array(
                    'type' => 'varchar',
                    'constraint' => 200,
                ),
            )
        );

        $this->dbforge->add_key('id_pesanan', true);

        $this->dbforge->create_table("tbl_pesanan", true);

        $this->dbforge->add_field(
            array(
                'id_pembelian' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                    'auto_increment' => true,
                ),
                'id_supplier' => array(
                    'type' => "INT",
                    'constraint' => 11,
                    'null' => false,
                ),
                'id_produk' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ),
                'jumlah' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ),
                'nominal' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
                ),
                'tanggal' => array(
                    'type' => "datetime",
                ),
                "`created_at` TIMESTAMP",
                "`updated_at` TIMESTAMP",
                "CONSTRAINT `FK_tbl_pembelian_tbl_produk` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`) ON UPDATE CASCADE",
                "CONSTRAINT `FK_tbl_pembelian_tbl_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`) ON UPDATE CASCADE",
            )
        );

        $this->dbforge->add_key('id_pembelian', true);
        $this->dbforge->create_table("tbl_pembelian", true);
    }

    public function down()
    {
        $this->dbforge->drop_table("tbl_admin");
        $this->dbforge->drop_table("tbl_bank_pembayaran");
        $this->dbforge->drop_table("tbl_carousell");
        $this->dbforge->drop_table("tbl_detail_kategori");
        $this->dbforge->drop_table("tbl_detail_pesan");
        $this->dbforge->drop_table("tbl_gambar_produk");
        $this->dbforge->drop_table("tbl_konsumen");
        $this->dbforge->drop_table("tbl_supplier");
    }
}

/* End of file Controllername.php */
