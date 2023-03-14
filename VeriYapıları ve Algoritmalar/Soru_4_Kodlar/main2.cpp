//soru 5 
// 1210505047 Gizemnur Özdoğan

#include<iostream>
using namespace std;

// öğrencilerin hangi bilgilerini depolayacağımızı bir struct içinde yazdık

struct myStruct {
    string Ad;
    string Soyad;
    long int TelNo;
    int OgrNo;
    std::string Adres;
    double Gano;
};

// 5 adet öğrencinin bilgilerini main metodda liste halinde yazdık.  

int main(){
    myStruct ogrenciler[5] {
        {"Gizem","Öz",905555555555,1210505047,"Atatürk Caddesi, No:2, Mersin",2.50},
        {"Esra","Bildik",905555555555,1210505047,"Atatürk Caddesi, No:2, Bursa",3.25},
        {"Eren","Mollaoğlu",905555555555,1210505047,"Ata Caddesi, No:3, İstanbul",2.70},
        {"Şule","Altuntaş",905555555555,1210505047,"Ata Caddesi, No:3, Ankara",3.20},
        {"Ayşe","Yılmaz",905555555555,1210505047,"Sevgi Sokak, No:4, İzmir",3.25},
       
    };
    
    for(int i=0;i<5;i++)
    {
        std::cout << i+1 <<"."<<"Öğrenci" << std::endl;
        std::cout << "Ad: " << ogrenciler[i].Ad << std::endl;
        std::cout << "Soyad: " << ogrenciler[i].Soyad <<std::endl;
        std::cout << "Telefon:" << ogrenciler[i].TelNo << std::endl;
        std::cout << "Numara: " << ogrenciler[i].OgrNo << std::endl;
        std::cout << "Adres: " << ogrenciler[i].Adres <<std::endl;
        std::cout << "Gano: " << ogrenciler[i].Gano<<std::endl;
        std::cout << "---------------------------------------" << std::endl;
    }
        
    return 0;
    
}
