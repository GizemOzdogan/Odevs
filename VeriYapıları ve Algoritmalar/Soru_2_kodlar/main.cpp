// soru 2
// 1210505047 Gizemnur Özdoğan

#include<iostream>
using namespace std;
#include <iostream> 

int main() {
    
    int myDizi[] = {10, 20, 30, 40, 50};
    int n = sizeof(myDizi) / sizeof(int);
    int min = myDizi[0];
        for(int i=0; i<n ; i++){
            if (myDizi[i] < min) {
                min = myDizi[i];
            }
        }

    std::cout << "Min eleman: " << min << std::endl;
    
        
    return 0;
    
}