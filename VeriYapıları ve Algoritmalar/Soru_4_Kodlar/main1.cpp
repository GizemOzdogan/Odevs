// soru 5 yanıt 1 
// 1210505047 Gizemnur Özdoğan

#include<iostream>
using namespace std;

// Struct kullanarak birden fazla veri yapısına sahip bileşenleri tek bir yapıda ifade edebiliriz.
// bu struct'ta öğrenci1'in bilgileri depolandı.

struct Ogrenci{
    string Ad;
    string Soyad;
    long int TelNo;
    int OgrNo;
    std::string Adres;
    double Gano;
};
    
// main metodun içerisinde, yukarıda tanımlanan Ogrenci'den ogrenci1 türetildi 
// ve öğrenciye ait değerler oluşturulan değişkenlere atandı.

int main()
{   
    Ogrenci ogrenci1;
    ogrenci1.Ad = "Gizem";
    ogrenci1.Soyad = "Özdoğan";
    ogrenci1.TelNo = 905555555555;
    ogrenci1.OgrNo = 1210505047;
    ogrenci1.Adres = "Atatürk Caddesi, No:2, Mezitli/Mersin";
    ogrenci1.Gano = 2.50;
    
   // cout ile öğrenci bilgileri ekrana yazdırıldı.
   // std::endl kullanılarak ekrana yazdırılacak bir sonraki sonuç için alt satıra geçilmiş oldu. 
    
    cout << "Ad: " << ogrenci1.Ad << std::endl;
    cout << "Soyad: " << ogrenci1.Soyad << std::endl;
    cout << "Telefon: " << ogrenci1.TelNo << std::endl;
    cout << "Öğrenci Numarası: " << ogrenci1.OgrNo << std::endl;
    cout << "Adres: " << ogrenci1.Adres << std::endl;
    cout << "Gano: " << ogrenci1.Gano ;
    
}
    
    
    
    
    
