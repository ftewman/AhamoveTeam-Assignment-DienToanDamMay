-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-11-29 07:25:51.251

-- tables
-- Table: tbl_ChiTietHoaDon
CREATE TABLE tbl_ChiTietHoaDon (
    tbl_HoaDon_maHoaDon int NOT NULL,
    tbl_SanPham_maSP varchar(8) NOT NULL,
    soLuongMua int NOT NULL,
    tongTien int NOT NULL
);

-- Table: tbl_HoaDon
CREATE TABLE tbl_HoaDon (
    maHoaDon int NOT NULL,
    ngayGD date NOT NULL,
    tbl_NhanVien_maNV varchar(8) NOT NULL,
    tbl_KhachHang_sdtKH varchar(11) NOT NULL,
    CONSTRAINT tbl_HoaDon_pk PRIMARY KEY (maHoaDon)
);

-- Table: tbl_KhachHang
CREATE TABLE tbl_KhachHang (
    sdtKH varchar(11) NOT NULL,
    tenKH varchar(20) NOT NULL,
    diaChiKH varchar(20) NOT NULL,
    CONSTRAINT tbl_KhachHang_pk PRIMARY KEY (sdtKH)
);

-- Table: tbl_LoaiSanPham
CREATE TABLE tbl_LoaiSanPham (
    maLoaiSP varchar(8) NOT NULL,
    tenLoaiSP varchar(20) NOT NULL,
    CONSTRAINT tbl_LoaiSanPham_pk PRIMARY KEY (maLoaiSP)
);

-- Table: tbl_NhanVien
CREATE TABLE tbl_NhanVien (
    maNV varchar(8) NOT NULL,
    matKhauNV varchar(15) NOT NULL,
    tenNV varchar(20) NOT NULL,
    diaChiNV varchar(20) NOT NULL,
    sdtNV varchar(11) NOT NULL,
    tbl_PhongBan_maPB varchar(8) NOT NULL,
    CONSTRAINT tbl_NhanVien_pk PRIMARY KEY (maNV)
);

-- Table: tbl_PhongBan
CREATE TABLE tbl_PhongBan (
    maPB varchar(8) NOT NULL,
    tenPB varchar(20) NOT NULL,
    CONSTRAINT tbl_PhongBan_pk PRIMARY KEY (maPB)
);

-- Table: tbl_QuanLy
CREATE TABLE tbl_QuanLy (
    maQL varchar(8) NOT NULL,
    maKhauQL varchar(15) NOT NULL,
    tenQL varchar(20) NOT NULL,
    diaChiQL varchar(20) NOT NULL,
    sdtQL varchar(11) NOT NULL,
    CONSTRAINT tbl_QuanLy_pk PRIMARY KEY (maQL)
);

-- Table: tbl_SanPham
CREATE TABLE tbl_SanPham (
    maSP varchar(8) NOT NULL,
    tenSP varchar(50) NOT NULL,
    soLuongSP int NOT NULL,
    giaSP int NOT NULL,
    tbl_LoaiSanPham_maLoaiSP varchar(8) NOT NULL,
    thuongHieu varchar(20) NOT NULL,
    heDieuHanh varchar(20) NOT NULL,
    CONSTRAINT tbl_SanPham_pk PRIMARY KEY (maSP)
);

-- foreign keys
-- Reference: tbl_ChiTietHoaDon_tbl_HoaDon (table: tbl_ChiTietHoaDon)
ALTER TABLE tbl_ChiTietHoaDon ADD CONSTRAINT tbl_ChiTietHoaDon_tbl_HoaDon FOREIGN KEY tbl_ChiTietHoaDon_tbl_HoaDon (tbl_HoaDon_maHoaDon)
    REFERENCES tbl_HoaDon (maHoaDon);

-- Reference: tbl_ChiTietHoaDon_tbl_SanPham (table: tbl_ChiTietHoaDon)
ALTER TABLE tbl_ChiTietHoaDon ADD CONSTRAINT tbl_ChiTietHoaDon_tbl_SanPham FOREIGN KEY tbl_ChiTietHoaDon_tbl_SanPham (tbl_SanPham_maSP)
    REFERENCES tbl_SanPham (maSP);

-- Reference: tbl_HoaDon_tbl_KhachHang (table: tbl_HoaDon)
ALTER TABLE tbl_HoaDon ADD CONSTRAINT tbl_HoaDon_tbl_KhachHang FOREIGN KEY tbl_HoaDon_tbl_KhachHang (tbl_KhachHang_sdtKH)
    REFERENCES tbl_KhachHang (sdtKH);

-- Reference: tbl_HoaDon_tbl_NhanVien (table: tbl_HoaDon)
ALTER TABLE tbl_HoaDon ADD CONSTRAINT tbl_HoaDon_tbl_NhanVien FOREIGN KEY tbl_HoaDon_tbl_NhanVien (tbl_NhanVien_maNV)
    REFERENCES tbl_NhanVien (maNV);

-- Reference: tbl_NhanVien_tbl_PhongBan (table: tbl_NhanVien)
ALTER TABLE tbl_NhanVien ADD CONSTRAINT tbl_NhanVien_tbl_PhongBan FOREIGN KEY tbl_NhanVien_tbl_PhongBan (tbl_PhongBan_maPB)
    REFERENCES tbl_PhongBan (maPB);

-- Reference: tbl_SanPham_tbl_LoaiSanPham (table: tbl_SanPham)
ALTER TABLE tbl_SanPham ADD CONSTRAINT tbl_SanPham_tbl_LoaiSanPham FOREIGN KEY tbl_SanPham_tbl_LoaiSanPham (tbl_LoaiSanPham_maLoaiSP)
    REFERENCES tbl_LoaiSanPham (maLoaiSP);

-- End of file.

