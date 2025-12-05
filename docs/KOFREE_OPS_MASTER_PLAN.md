KOFREE OPS – GLOBAL RESTAURANT OS MASTER PLAN (TÜRKİYE ÖNCELİKLİ)
1. PROJENİN TANIMI

KóFREE OPS, Foodking 3.7 tabanından doğan fakat onu çok aşacak şekilde geliştirilen;
Türkiye öncelikli, fakat 5–10 yıl içinde global pazara açılabilecek bir Restaurant Operating System (Restaurant OS) platformudur.

Bu sistem:

POS

Kiosk

QR Sipariş

Kurye Uygulaması

Marketplace Entegrasyonları (Yemeksepeti, Trendyol, Getir…)

Muhasebe Entegrasyonları (Logo, Mikro, Paraşüt…)

Çoklu Marka (Multi-brand)

Çoklu Şube (Multi-tenant)

Tema Motoru (admin/pos/kiosk/qr için farklı temalar)

Online + Offline çalışma (Flutter local DB + sync engine)

Modular Monolith Backend (Laravel 10/11)

yaklaşımını bir araya getiren Türkiye’nin ilk tam entegre Restaurant OS çözümüdür.

2. GENEL MİMARİ (3 Katman)
2.1 Backend Core (Laravel 10/11 Modular Monolith)

Klasör yapısı:

app/
  Core/
    Models/
    Services/
    Enums/
    Support/

  Modules/
    Pos/
    Marketplace/
    QrOrdering/
    Kiosk/
    Courier/
    Reporting/
    Accounting/
    Franchise/
    Theme/

  Drivers/
    Marketplace/
    Payment/

  Shared/
    Http/
    DTO/
    Traits/
    Resources/


Backend’in temel domain modelini Core yönetir.
Modüller ise bağımsız “özellik paketleri”dir (Marketplace, Kiosk, POS vs.)

3. DOMAIN MODELİ (ÇEKİRDEK TABLOLAR)
Marka & Şube Yönetimi

brands

branches

user_branch

devices

Lisanslama

plans

features

plan_feature

brand_plan_subscriptions

brand_feature_overrides

Marketplace Modelleri

marketplace_channels

marketplace_category_maps

marketplace_item_maps

marketplace_order_logs

Sipariş & Menü Modelleri

products

categories

modifiers

orders

order_items

payments

Audit

audit_logs

4. MARKETPLACE DRIVER MİMARİSİ

Her entegrasyonun kendi sürücüsü vardır:

app/Modules/Marketplace/Drivers/
  YemeksepetiDriver.php
  TrendyolDriver.php
  GetirDriver.php
  MigrosYemekDriver.php
  UberEatsDriver.php


Hepsi şu interface’i implement eder:

interface MarketplaceDriverInterface {
    public function pullOrders(): void;
    public function syncMenu(): void;
    public function acknowledgeOrder(string $externalOrderId): void;
    public function cancelOrder(string $externalOrderId, string $reason): void;
}


Bu sayede yeni bir ülkeye / marketplace’e geçmek sadece yeni Driver eklemek kadar kolaydır.

5. PAYMENT GATEWAY MİMARİSİ

Geleceğe dönük, bankalar + fintech + kripto destekli driver sistemi.

app/Drivers/Payment/
  IyzicoGateway.php
  PayTRGateway.php
  ParamGateway.php
  PaynetGateway.php
  CryptoGateway.php (ileride)


Hepsi şu interface’i kullanır:

interface PaymentGatewayInterface {
    public function createPaymentIntent(array $data): PaymentIntentResult;
    public function capture(string $transactionId): PaymentResult;
    public function refund(string $transactionId, float $amount): RefundResult;
}

6. TEMA MOTORU (ADMIN / POS / KIOSK / QR)

Tema motoru, Türkiye’de sektöre özel premium UI satılabilmesini sağlar.

app/Modules/Theme/
  Themes/
    kofree-classic-pos/
    dark-minimal-pos/


Her context bağımsızdır:

admin

pos

kiosk

qr

Tema seçimleri:

Brand → tüm şubelere

Branch → tek şubeye
uygulanabilir.

Fallback mekanizması sayesinde override edilmeyen view’lar otomatik default’tan gelir.

7. OFFLINE-FIRST FLUTTER ARCHITECTURE

POS, Kiosk, Kitchen, Courier uygulamaları:

Flutter

Local DB (Hive veya SQLite)

Sync Engine

Background tasks

Queue sistemi (temp_id → cloud_id eşleme)

Çevrimdışı sipariş oluşturma

İnternet geldiğinde otomatik sync

Bu sayede elektrik / internet kesilse bile restoran çalışmaya devam eder.

8. ÇOKLU MARKA (MULTI-BRAND) + ÇOKLU ŞUBE (MULTI-TENANT)

Tek sistem üzerinden:

Tek markalı ufak işletmeler

Çok şubeli zincirler

Franchise ağları

hepsi yönetilebilir.

Roller:

Super Admin (tüm sistemi yönetir)

Brand Owner (sadece kendi markasını)

Branch Manager (kendi şubesini)

Cashier

Kitchen

Courier

Accountant

Support

Auditor

9. TÜRKİYE ÖNCELİKLİ ENTEGRASYONLAR
Marketplace

Yemeksepeti

Trendyol Yemek

Getir Yemek

Migros Yemek

Fuudy (opsiyonel)

Sanal POS / Ödeme

İyzico

PayTR

Param

Paynet

Muhasebe

Logo

Mikro

Paraşüt

Nebim

Netsis

10. GÜVENLİK

Hashlenmiş tokenlar (Sanctum)

Rate limit (login / webhook)

Secret encryption

OWASP top 10 koruması

Audit log sistemi

11. GELİŞTİRME KURALLARI
11.1 Kodlama dili

Değişken/Model/Service/Class → İngilizce

UI metinleri → Türkçe

11.2 Mimari kurallar

Core domain → app/Core

Modüller → app/Modules

Ortak kod → app/Shared

Marketplace Driver → app/Modules/Marketplace/Drivers

Ödeme Driver → app/Drivers/Payment

11.3 Flutter uygulamaları

Offline-first

Sync Engine zorunlu

Global API endpoint: /api/v1/...

12. SENİN (CHATGPT) ROLÜN

Sen:

Bu sistemin Kıdemli Yazılım Mimarı + Full Stack Lead Developer’ısın.

Kullanıcıyı sıfır teknik bilgiye sahipmiş gibi adım adım yönlendireceksin.

Her adımda:

Hangi klasöre gireceğini

Hangi dosyayı açacağını

VS Code’da nereye tıklayacağını

Terminalde ne yazacağını
açık açık söyleyeceksin.

Yeni özellik istersem:

Mimaride nereye oturacağını anlat

Terminal komutlarını ver

Dosya yollarını yaz

Kod bloklarını tek tek oluştur

Nasıl test edeceğimi anlat

13. 5 YILLIK HEDEF
1. yıl

Türkiye’de 100 restoran

Marketplace entegrasyonu %100 stabil

POS, Kiosk, QR tam senkron

3. yıl

1.000 işletme

Global marketplace driver (UberEats, DoorDash)

5. yıl

Avrupa + Orta Doğu’da Restaurant OS olarak konumlanma

Tema Marketplace (POS/Kiosk temaları satılıyor)

SON SÖZ

Bu doküman, KóFREE OPS’ın resmi mimari anayasasıdır.
Gelecek tüm geliştirmeler buna göre yapılacaktır.