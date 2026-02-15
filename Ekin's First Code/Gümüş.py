#                  #
### SAYFA DÜZENİ ###
#                  #
def üst_yaz():
    print ("┏" + "━"*98 + "┓")
    return
def alt_yaz():
    print ("┗" + "━"*98 + "┛")
    return
def boş():
    print ("┃" + " "*98 + "┃")
    return
def yaz(metin):
    print ("┃ " + metin + (97 - len(metin))*" " + "┃")
    return
def başlık(metin):
    üst_yaz()
    print("┃┏━" + "━" * len(metin) + "━┓" + " "*(94 - len(metin)) + "┃")
    print("┃┃ " + metin + " ┃" + " "*(94 - len(metin)) + "┃")
    print("┃┗━" + "━" * len(metin) + "━┛" + " " * (94 - len(metin)) + "┃")
    return
def kutucuk(metin):
    üst_yaz()
    yaz(metin)
    alt_yaz()
    return
#            #
### ARAYÜZ ###
#            #
def alıcı():
    print(" ")
    girdi = input(" >>>>- ")
    print(" ")
    return girdi
def gün_al():
    global g
    kutucuk("Bugün kaçıncı gün?")
    g = alıcı()
    return
def ay_al():
    global a
    kutucuk("Bugün kaçıncı ay?")
    a = alıcı()
    return
def tarih_al():
    global a
    global g
    kabul = 0
    while True:
        while True:
            while True:
                gün_al()
                try:
                    g = int(g)
                    kabul = 1
                except ValueError:
                    kutucuk("Lütfen sayı giriniz.")
                    kabul = 0
                if kabul == 1:
                    break
            if g <= 31 and g >= 1:
                break
            else:
                kutucuk("Lütfen 1-31 arasında sayı giriniz.")
        while True:
            while True:
                kabul = 0
                ay_al()
                try:
                    a = int(a)
                    kabul = 1
                except ValueError:
                    kutucuk("Lütfen sayı giriniz.")
                    kabul = 0
                if kabul == 1:
                    break
            if a <= 11 and a >= 3:
                break
            else:
                kutucuk("Lütfen 3-11 arasında sayı giriniz.")
        kabul = 1
        if a == 4 or a == 6 or a == 9 or a == 11:
            if g == 31:
                kutucuk("Girdiğiniz ay 31 güne sahip değildir.")
                kabul = 0
        if kabul == 1:
            break
    return
def tam_tarih ():
    global g
    global a
    g = str(g)
    a = str(a)
    if len(g) == 1:
        g_eklenecek = "0" + g
    else:
        g_eklenecek = g
    if len(a) == 1:
        a_eklenecek = "0" + a
    else:
        a_eklenecek = a
    return (g_eklenecek + "/" + a_eklenecek + "/2019")
def a_menü():
    başlık("-<<<< EKİN SİLVER BİLANÇO PROGRAMI (BETA) >>>>-")
    boş()
    boş()
    yaz(">>>>- Listeye Ekle [E]")
    boş()
    yaz(">>>>- Göster [G] (Şu anda çalışmıyor.)")
    boş()
    yaz(">>>>- Bilgiler [B]")
    boş()
    yaz(">>>>- Güvenli Çıkış [Ç]")
    boş()
    boş()
    alt_yaz()
    kumanda = alıcı()
    if kumanda == "E" or kumanda == "e":
        y_menü()
    elif kumanda == "G" or kumanda == "g":
        kutucuk("Bu kısım daha sonra eklenecektir.")
        a_menü()
    elif kumanda == "B" or kumanda == "b":
        b_menü()
    elif kumanda == "Ç" or kumanda == "ç":
        return
    else:
        kutucuk("Lütfen gitmek istediğiniz seçeneğin harfini giriniz.")
        a_menü()
def b_menü():
    başlık(">>>>- BİLGİLER")
    boş()
    yaz("Ekin Silver Bilanço Programı; kazanılan miktarın sınıflandırılması, bilanço çıkartması,")
    yaz("bunun üzerine yorum yapılarak daha iyi performans sağlanması için tasarlanmıştır.")
    boş()
    yaz("Grafik tasarımı ve satış kaydının gösterimi daha sonra kodlanacaktır.")
    boş()
    yaz("Menüler arası geçiş yapmak için gereken harfi girip 'Enter' tuşuna basmak yeterli")
    yaz("olacaktır. Yapılan işlemlerde talimatlar işlem sırasında size yardımcı olacaktır.")
    boş()
    yaz("Herhangi bir problem ile karşılaşırsanız yazılımın yapımcısına anlatabilirsiniz. :)")
    boş()
    yaz("Ekin Aslan 05537316580")
    boş()
    alt_yaz()
    kutucuk("Geri dönmek için 'Enter' tuşuna basınız.")
    print(" ")
    gizli = input(" >>>>- ( Geri ) ")
    print(" ")
    if gizli == "Geri" or gizli == "geri":
        üst_yaz()
        yaz("Sizi dün sevdim bugün seviyorum yarın da seveceğim canım ailem.")
        boş()
        yaz("            @@@@@@           @@@@@@")
        yaz("          @@@@@@@@@@       @@@@@@@@@@")
        yaz("        @@@@@@@@@@@@@@   @@@@@@@@@@@@@@")
        yaz("      @@@@@@@@@@@@@@@@@ @@@@@@@@@@@@@@@@@")
        yaz("     @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@")
        yaz("    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@")
        yaz("    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@")
        yaz("    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@")
        yaz("     @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@")
        yaz("      @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@")
        yaz("       @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@")
        yaz("        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@")
        yaz("          @@@@@@@@@@@@@@@@@@@@@@@@@@@")
        yaz("            @@@@@@@@@@@@@@@@@@@@@@@")
        yaz("              @@@@@@@@@@@@@@@@@@@")
        yaz("                @@@@@@@@@@@@@@@")
        yaz("                  @@@@@@@@@@@")
        yaz("                    @@@@@@@")
        yaz("                      @@@")
        yaz("                       @")
        boş()
        alt_yaz()
        print(" ")
        gizli = input(" >>>>- ( Geri ) ")
        print(" ")
    a_menü()
def y_menü():
    defa = 0
    global liste
    başlık(">>>>- LİSTE")
    boş()
    boş()
    for eleman in liste:
        defa += 1
        yaz(str(defa) + " -> " + eleman)
    if len(liste) == 0:
        yaz("- Şu an listeye eklenmiş satış yok.")
    boş()
    alt_yaz()
    üst_yaz()
    boş()
    yaz(">>>>- Ekle [E]")
    boş()
    yaz(">>>>- Çıkar [Ç]")
    boş()
    yaz(">>>>- Kaydet [K]")
    boş()
    yaz(">>>>- Geri [G]")
    boş()
    alt_yaz()
    kumanda = alıcı()
    if kumanda == "E" or kumanda == "e":
        ekleyici()
    elif kumanda == "Ç" or kumanda == "ç":
        çıkarıcı()
    elif kumanda == "K" or kumanda == "k":
        if len(liste) == 0:
            kutucuk("Kaydedilecek birşey bulunmuyor.")
            y_menü()
        else:
            kaydedici()
    elif kumanda == "G" or kumanda == "g":
        a_menü()
    else:
        kutucuk("Lütfen gitmek istediğiniz seçeneğin harfini giriniz.")
        y_menü()
def ekleyici():
    global yuzuk
    global kolye
    global kupe
    global bileklik
    global zincir
    global pandora
    global sultanit
    global celik
    kabul = 0
    son = ""
    while True:
        kutucuk("Satılan gümüşün türünü giriniz. (Örneğin: Yüzük / yüzük)")
        tur = alıcı()
        for sozcuk in sozcukler:
            if sozcuk == tur:
                kabul = 1
        if kabul == 1:
            break
        else:
            üst_yaz()
            yaz("Tür belirlenemedi, lütfen tekrar deneyiniz.")
            boş()
            yaz(">>>>- Geçerli türler:")
            boş()
            yaz("Yüzük, yüzük")
            yaz("Kolye, kolye")
            yaz("Küpe, küpe")
            yaz("Bileklik, bileklik")
            yaz("Zincir, zincir")
            yaz("Pandora, pandora")
            yaz("Sultanit, sultanit")
            yaz("Çelik, çelik")
            alt_yaz()
    while True:
        while True:
            kutucuk("Satılan gümüşün satıldığı fiyatı giriniz. (Örneğin: 25, 100, 750)")
            fiyat = alıcı()
            try:
                fiyat = int(fiyat)
                break
            except ValueError:
                kutucuk("Lütfen sadece sayı giriniz.")
        if fiyat <= 0:
            kutucuk("Lütfen sayıyı pozitif olarak giriniz.")
        else:
            break
    while True:
        kabul = 0
        kutucuk("Fiyatın para birimini giriniz. (Örneğin: TL / tl / Lira / lira)")
        birim = alıcı()
        for para_birimi in birimler:
            if para_birimi == birim:
                kabul = 1
        if kabul == 1:
            break
        else:
            üst_yaz()
            yaz("Lütfen geçerli para birimi giriniz.")
            boş()
            yaz(">>>>- Geçerli para birimleri:")
            boş()
            yaz("TL, tl, Lira, lira")
            yaz("DL, dl, Dolar, dolar")
            yaz("EU, eu, Euro, euro")
            yaz("EN, en, Sterlin, sterlin")
            alt_yaz()
    if tur == sozcukler[0] or tur == sozcukler[1]:
        son = sozcukler[0]
    elif tur == sozcukler[2] or tur == sozcukler[3]:
        son = sozcukler[2]
    elif tur == sozcukler[4] or tur == sozcukler[5]:
        son = sozcukler[4]
    elif tur == sozcukler[6] or tur == sozcukler[7]:
        son = sozcukler[6]
    elif tur == sozcukler[8] or tur == sozcukler[9]:
        son = sozcukler[8]
    elif tur == sozcukler[10] or tur == sozcukler[11]:
        son = sozcukler[10]
    elif tur == sozcukler[12] or tur == sozcukler[13]:
        son = sozcukler[12]
    else:
        son = sozcukler[14]
    son = son + " " + str(fiyat) + " "
    if birim == birimler[0] or birim == birimler[1] or birim == birimler[2] or birim == birimler[3]:
        son += birimler[2]
    elif birim == birimler[4] or birim == birimler[5] or birim == birimler[6] or birim == birimler[7]:
        son += birimler[6]
    elif birim == birimler[8] or birim == birimler[9] or birim == birimler[10] or birim == birimler[11]:
        son += birimler[10]
    else:
        son += birimler[14]
    başlık(son)
    alt_yaz()
    kutucuk("Devam etmek için Enter'a basın, tekrar girmek için 'Tekrar'; iptal etmek için 'İptal' yazın.")
    print(" ")
    onay = input(" >>>>- ( Onay ) ")
    print(" ")
    if onay == "İptal" or onay == "iptal":
        y_menü()
    elif onay == "Tekrar" or onay == "tekrar":
        ekleyici()
    else:
        liste.append(son)
        y_menü()
    return
def çıkarıcı():
    global liste
    if len(liste) == 0:
        kutucuk("Listede çıkarılacak herhangi bir satış bulunmuyor. Geri dönmek için 'Enter' tuşuna basınız.")
        print(" ")
        onay = input(" >>>>- ( Geri ) ")
        print(" ")
        y_menü()
    else:
        while True:
            while True:
                defa = 0
                başlık(">>>>- LİSTEDEKİLER")
                boş()
                boş()
                for eleman in liste:
                    defa += 1
                    yaz(str(defa) + " -> " + eleman)
                boş()
                alt_yaz()
                kutucuk("Listeden çıkarılacak satışın numarasını giriniz.")
                numara = alıcı()
                try:
                    numara = int(numara)
                    break
                except ValueError:
                    kutucuk("Lütfen sayı giriniz.")
            if numara <= len(liste) and numara > 0:
                break
            else:
                kutucuk("Lütfen var olan satış numarası giriniz.")
        del liste[numara - 1]
        kutucuk("Seçilen satış silindi.")
        y_menü()
def binize(sayi):
    if sayi > 9999:
        sayi = "+OBN"
    else:
        sayi = str(sayi)
        if len(sayi) == 1:
            sayi = "000" + sayi
        elif len(sayi) == 2:
            sayi = "00" + sayi
        elif len(sayi) == 3:
            sayi = "0" + sayi
    return sayi
def oluşturucu ():
    global liste
    bin = 0000
    son = ""
    yuzuk_tl = yuzuk_dl = yuzuk_eu = yuzuk_en = bin
    kolye_tl = kolye_dl = kolye_eu = kolye_en = bin
    kupe_tl = kupe_dl = kupe_eu = kupe_en = bin
    bileklik_tl = bileklik_dl = bileklik_eu = bileklik_en = bin
    zincir_tl = zincir_dl = zincir_eu = zincir_en = bin
    pandora_tl = pandora_dl = pandora_eu = pandora_en = bin
    sultanit_tl = sultanit_dl = sultanit_eu = sultanit_en = bin
    celik_tl = celik_dl = celik_eu = celik_en = bin
    for eleman in liste:
        eleman = str.split(eleman)
        if eleman[0] == "Yüzük":
            if eleman[2] == "Lira":
                fiyat = int(eleman[1])
                yuzuk_tl += fiyat
            elif eleman[2] == "Dolar":
                fiyat = int(eleman[1])
                yuzuk_dl += fiyat
            elif eleman[2] == "Euro":
                fiyat = int(eleman[1])
                yuzuk_eu += fiyat
            elif eleman[2] == "Sterlin":
                fiyat = int(eleman[1])
                yuzuk_en += fiyat
        elif eleman[0] == "Kolye":
            if eleman[2] == "Lira":
                fiyat = int(eleman[1])
                kolye_tl += fiyat
            elif eleman[2] == "Dolar":
                fiyat = int(eleman[1])
                kolye_dl += fiyat
            elif eleman[2] == "Euro":
                fiyat = int(eleman[1])
                kolye_eu += fiyat
            elif eleman[2] == "Sterlin":
                fiyat = int(eleman[1])
                kolye_en += fiyat
        elif eleman[0] == "Küpe":
            if eleman[2] == "Lira":
                fiyat = int(eleman[1])
                kupe_tl += fiyat
            elif eleman[2] == "Dolar":
                fiyat = int(eleman[1])
                kupe_dl += fiyat
            elif eleman[2] == "Euro":
                fiyat = int(eleman[1])
                kupe_eu += fiyat
            elif eleman[2] == "Sterlin":
                fiyat = int(eleman[1])
                kupe_en += fiyat
        elif eleman[0] == "Bileklik":
            if eleman[2] == "Lira":
                fiyat = int(eleman[1])
                bileklik_tl += fiyat
            elif eleman[2] == "Dolar":
                fiyat = int(eleman[1])
                bileklik_dl += fiyat
            elif eleman[2] == "Euro":
                fiyat = int(eleman[1])
                bileklik_eu += fiyat
            elif eleman[2] == "Sterlin":
                fiyat = int(eleman[1])
                bileklik_en += fiyat
        elif eleman[0] == "Zincir":
            if eleman[2] == "Lira":
                fiyat = int(eleman[1])
                zincir_tl += fiyat
            elif eleman[2] == "Dolar":
                fiyat = int(eleman[1])
                zincir_dl += fiyat
            elif eleman[2] == "Euro":
                fiyat = int(eleman[1])
                zincir_eu += fiyat
            elif eleman[2] == "Sterlin":
                fiyat = int(eleman[1])
                zincir_en += fiyat
        elif eleman[0] == "Pandora":
            if eleman[2] == "Lira":
                fiyat = int(eleman[1])
                pandora_tl += fiyat
            elif eleman[2] == "Dolar":
                fiyat = int(eleman[1])
                pandora_dl += fiyat
            elif eleman[2] == "Euro":
                fiyat = int(eleman[1])
                pandora_eu += fiyat
            elif eleman[2] == "Sterlin":
                fiyat = int(eleman[1])
                pandora_en += fiyat
        elif eleman[0] == "Sultanit":
            if eleman[2] == "Lira":
                fiyat = int(eleman[1])
                sultanit_tl += fiyat
            elif eleman[2] == "Dolar":
                fiyat = int(eleman[1])
                sultanit_dl += fiyat
            elif eleman[2] == "Euro":
                fiyat = int(eleman[1])
                sultanit_eu += fiyat
            elif eleman[2] == "Sterlin":
                fiyat = int(eleman[1])
                sultanit_en += fiyat
        elif eleman[0] == "Çelik":
            if eleman[2] == "Lira":
                fiyat = int(eleman[1])
                celik_tl += fiyat
            elif eleman[2] == "Dolar":
                fiyat = int(eleman[1])
                celik_dl += fiyat
            elif eleman[2] == "Euro":
                fiyat = int(eleman[1])
                celik_eu += fiyat
            elif eleman[2] == "Sterlin":
                fiyat = int(eleman[1])
                celik_en += fiyat
    son = tam_tarih() + " " + binize(yuzuk_tl) + " " + binize(yuzuk_dl) + " " + binize(yuzuk_eu) + " " + binize(yuzuk_en)
    son = son + " " + binize(kolye_tl) + " " + binize(kolye_dl) + " " + binize(kolye_eu) + " " + binize(kolye_en)
    son = son + " " + binize(kupe_tl) + " " + binize(kupe_dl) + " " + binize(kupe_eu) + " " + binize(kupe_en)
    son = son + " " + binize(bileklik_tl) + " " + binize(bileklik_dl) + " " + binize(bileklik_eu) + " " + binize(bileklik_en)
    son = son + " " + binize(zincir_tl) + " " + binize(zincir_dl) + " " + binize(zincir_eu) + " " + binize(zincir_en)
    son = son + " " + binize(pandora_tl) + " " + binize(pandora_dl) + " " + binize(pandora_eu) + " " + binize(pandora_en)
    son = son + " " + binize(sultanit_tl) + " " + binize(sultanit_dl) + " " + binize(sultanit_eu) + " " + binize(sultanit_en)
    son = son + " " + binize(celik_tl) + " " + binize(celik_dl) + " " + binize(celik_eu) + " " + binize(celik_en) + "\n"
    return son
def konumlandırıcı():
    global g
    global a
    g = int(g)
    a = int(a)
    if a == 3:
        return g
    elif a == 4:
        return (g + 31)
    elif a == 5:
        return (g + 61)
    elif a == 6:
        return (g + 92)
    elif a == 7:
        return (g + 122)
    elif a == 8:
        return (g + 153)
    elif a == 9:
        return (g + 184)
    elif a == 10:
        return (g + 214)
    else:
        return (g + 245)
def kaydedici():
    global kayit
    kaydedilecek = oluşturucu()
    konum = konumlandırıcı()
    dosya = open("Kayıt.txt", "r")
    depo = dosya.readlines()
    dosya.close()
    depo[konum] = kaydedilecek
    yeni = open("Kayıt.txt", "w")
    for cizgi in depo:
        yeni.write(cizgi)
    yeni.close()
    liste = []
    kayit = 1
    kutucuk("Başarıyla kaydedildi.")
    return a_menü()
#                  #
### BAŞLATICILAR ###
#                  #
g = 0
a = 0
sozcukler = ["Yüzük", "yüzük", "Kolye", "kolye", "Küpe", "küpe", "Bileklik", "bileklik", "Zincir", "zincir",
"Pandora", "pandora", "Sultanit", "sultanit", "Çelik", "çelik"]
birimler = ["TL", "tl", "Lira", "lira", "DL", "dl", "Dolar", "dolar", "EU", "eu", "Euro", "euro",
"EN", "en", "Sterlin", "sterlin"]
liste = []
kayit = 0
#             #
### ANA KOD ###
#             #
while True:
    tarih_al()
    kutucuk("Tarih alındı. Şu an ki tarih: " + tam_tarih())
    kutucuk("Tarihi onaylamak için 'Enter' tuşuna basın, tekrar yazmak için 'Tekrar' yazın.")
    print(" ")
    ayar = input(" >>>>- ( Onay ) ")
    print(" ")
    if not (ayar == "Tekrar" or ayar == "tekrar"):
        break
üst_yaz()
for x in range (96):
    yaz("■"*(x + 1))
alt_yaz()
üst_yaz()
yaz("  ______ _    _          _____ _ _")
yaz(" |  ____| |  (_)        / ____(_) |")
yaz(" | |__  | | ___ _ __   | (___  _| |_   _____ _ __")
yaz(" |  __| | |/ / | '_ \   \___ \| | \ \ / / _ \ '__|")
yaz(" | |____|   <| | | | |  ____) | | |\ V /  __/ |")
yaz(" |______|_|\_\_|_| |_| |_____/|_|_| \_/ \___|_|")
boş()
alt_yaz()
if g == "1" and a == "3":
    üst_yaz()
    boş()
    boş()
    yaz("Doğum günün kutlu olsun anne! <3")
    boş()
    boş()
    alt_yaz()
elif g == "1" and a == "4":
    üst_yaz()
    boş()
    boş()
    yaz("Doğum günün kutlu olsun baba! <3")
    boş()
    boş()
    alt_yaz()
elif g == "5" and a == "11":
    üst_yaz()
    boş()
    boş()
    yaz("Doğum günün kutlu olsun Efe! <3")
    boş()
    boş()
    alt_yaz()
elif g == "23" and a == "4":
    üst_yaz()
    boş()
    boş()
    yaz("23 Nisan Ulusal Egemenlik ve Çocuk Bayramı'mız kutlu olsun!")
    boş()
    boş()
    alt_yaz()
elif g == "1" and a == "5":
    üst_yaz()
    boş()
    boş()
    yaz("1 Mayıs Emek ve Dayanışma Günü'müz kutlu olsun!")
    boş()
    boş()
    alt_yaz()
elif g == "19" and a == "5":
    üst_yaz()
    boş()
    boş()
    yaz("19 Mayıs Gençlik ve Spor Bayramı'mız kutlu olsun!")
    boş()
    boş()
    alt_yaz()
elif g == "30" and a == "8":
    üst_yaz()
    boş()
    boş()
    yaz("30 Ağustos Zafer Bayramı'mız kutlu olsun!")
    boş()
    boş()
    alt_yaz()
elif g == "29" and a == "10":
    üst_yaz()
    boş()
    boş()
    yaz("29 Ekim Cumhuriyet Bayramı'mız kutlu olsun!")
    boş()
    boş()
    alt_yaz()
elif g == "18" and a == "3":
    üst_yaz()
    boş()
    boş()
    yaz("Çanakkale Deniz Zaferimiz kutlu olsun!")
    boş()
    boş()
    alt_yaz()
elif g == "29" and a == "4":
    üst_yaz()
    boş()
    boş()
    yaz("Kut Bayramı'mız (Kut'ül Amare) kutlu olsun!")
    boş()
    boş()
    alt_yaz()
a_menü()
üst_yaz()
for x in range (96):
    yaz("■"*(96 - x))