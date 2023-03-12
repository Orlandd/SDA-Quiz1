#include <iostream>
#include <conio.h>
#include <fstream>
#include <stdlib.h>
#include <stdio.h>
using namespace std;

string caesar (string kalimat, int key) {
    string kalimatBaru = "";
    int key1 = key % 26;


    for(int i= 0 ; i < kalimat.length() ; i++) {
        if(int(kalimat[i]) == 32) {
            kalimatBaru += kalimat[i];
            continue;
        }

        if(islower(kalimat[i])) {
            int karakter = int(kalimat[i]) - key1;
            if(karakter < 97) {
                karakter += 26;
            }
            if (karakter >122) {
                karakter -= 26;
            }

            kalimatBaru += char(karakter);
        } else {
            int karakter = int(kalimat[i]) - key1;
            if(karakter < 65) {
                karakter += 26;
            }
            if (karakter >90) {
                karakter -= 26;
            }

            kalimatBaru += char(karakter);
        }
    }
    return kalimatBaru;
}

int main(void) {
    int key = 0;
    string text;

    cout << "key : ";
    cin >>key ;

    // membuka file 
    ifstream awal("akhir.txt");
    if(awal.is_open()) {
        getline(awal, text);
    } else {
        cout << "file not found";
    }

    // cout << text << endl;

    // membuat file
    ofstream akhir("awal.txt");
    if(akhir.is_open()) {
        akhir << caesar(text, key);
        cout << "File decrypt";
    }

    // cout << caesar("ABCDEFGHIJKL MNOPQRSTUVWXYZ", key) << endl;
}
    