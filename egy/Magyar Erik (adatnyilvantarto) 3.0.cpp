#include <stdio.h>
#include <stdlib.h>

#ifdef __WIN32__
#define CLEAR system("cls");
#else
#define CLEAR system("clear");
#endif

struct adatok{
	int id[1000];
	int szam[1000];
	char nev[1000][80];
};

adatok ujadat(adatok adat);
adatok listazas(adatok adat);
adatok kereses(adatok adat);
adatok adatmodositas(adatok adat);
adatok torles(adatok adat);
	
	int vege=0;
	int biztos=0;
	int k;	

int main(){
	adatok adat;
	int valaszt;
do {
	do {
	printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n\n");
	printf("Funkciok:\n\n");
	printf("1.	Ujadat bevitel\n");
	printf("2.	Kereses\n");
	printf("3.	Adatmodositas\n");
	printf("4.	Torles\n");
	printf("5.	Listazas\n");
	printf("6.	Kilepes\n\n");
	printf("Valasszon: ");
	scanf("%d",&valaszt);
	
	CLEAR;

	if (valaszt==1){		//uj adat kezdete
  		adat=ujadat(adat);
}
else							//uj adat vege
	if (valaszt==5)	{		//listazas eleje
		adat=listazas(adat);
}
else							//listazas vege
	if (valaszt==2){		//kereses eleje
		adat=kereses(adat);
}
else							//kereses vege	
	if (valaszt==3){		//adatm. eleje
		adat=adatmodositas(adat);
}
else							//adatm. vege
	if (valaszt==4){		//torles eleje
		adat=torles(adat);
}							//torles vege
}
	while(valaszt!=6);
	printf("Biztosan kilep?(0:nem, 1:igen): ");
	scanf("%d",&biztos);
	CLEAR;
}
while (biztos!=1);
}

adatok ujadat(adatok adat){
	bool ujra=false;
	bool van=false;
	int azon=0;
	do{
				printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tUJADAT BEVITEL\n\n\n");
		ujra=false;
		van=false;	
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (int i=0;i<vege;i++)
		if (adat.id[i]==azon) van=true;
		if (van==true){
		 printf("Ilyen mar van\n");
		 printf("Masik azonosito megadasa(1) vagy vissza a fomenube(0)?\n");
		 scanf("%d",&ujra);
			}
		else {
		adat.id[vege]=azon;
		 printf("Adja meg a nevet: ");
		 scanf("%s",adat.nev[vege]);
		 printf("Adja meg az osztalyzatot: ");
		 scanf("%d",&adat.szam[vege]);
		 vege++;
		 printf("\nMENTVE\n\n");
	 	 printf("Ujabb adat bevitele(1) vagy vissza a fomenube(0)?\n");
		 scanf("%d",&ujra);	
		}
		CLEAR;
	}
	while(ujra==true);
	return adat;
}

adatok adatmodositas(adatok adat){
	bool ujra=false;
	bool van=false;
	int azon=0;
	int megvan=0;
	int ujszam;
	int mode=0;
	char ujnev[80];
	do{
			van=false;
			ujra=false;
			mode=0;
			printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tADATMODOSITAS\n\n\n");
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (int i=0;i<vege;i++)
		if (adat.id[i]==azon) {
			van=true;
			megvan=i;
		}
		if (van==true) {
			printf("\nA keresett azonosito: %d\n",azon);
			printf("A hozzatartozo nev: %s\n",adat.nev[megvan]);
			printf("A hozzatartozo osztalyzat: %d\n\n",adat.szam[megvan]);
			printf("Valoban modositja?(0:megse, 1:igen)\n");
			scanf("%d",&mode);
			if(mode==1){
			printf("Az uj nev: ");
			scanf("%s",&ujnev);
			k=0;
			while(k!=80){
			adat.nev[megvan][k]=ujnev[k];
			k++;
			}
			printf("Az uj osztalyzat: ");
			scanf("%d",&ujszam);
			adat.szam[megvan]=ujszam;
			printf("\nMENTVE\n\n");
		}
			}
		else{
		 printf("Nincs ilyen azonosito\n");
		}
		printf("Masik adat modositasa(1) vagy vissza a fomenube(0)?\n");
		scanf("%d",&ujra);
		CLEAR;
}
	while(ujra==true);
	return adat;	
}

adatok kereses(adatok adat){	
	bool ujra=false;
	bool van=false;
	int azon=0;
	int megvan=0;
	do{
		van=false;
		ujra=false;
		printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tKERESES\n\n\n");
	
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (int i=0;i<vege;i++)
		if (adat.id[i]==azon) {
			van=true;
			megvan=i;
		}
		if (van==true) {
			printf("\nA keresett azonosito: %d\n",azon);
			printf("A hozzatartozo nev: %s\n",adat.nev[megvan]);
			printf("A hozzatartozo osztalyzat: %d\n\n",adat.szam[megvan]);
		}
		else{
		 	printf("Nincs ilyen azonosito\n");
		}
		printf("Uj kereses(1) vagy vissza a fomenube(0)?\n");
		scanf("%d",&ujra);
		CLEAR;
	}
	while(ujra==true);	
	return adat;
}

adatok torles(adatok adat){
	bool ujra=false;
	bool van=false;
	int azon=0;
	int i=0;
	int megvan=0;
	int valoban=0;
	do{
		van=false;
		valoban=0;
		ujra=false;
		printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tTORLES\n\n\n");
	
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (i=0;i<vege;i++)
		if (adat.id[i]==azon) {
			van=true;
			megvan=i;
		}
		if (van==true) {
			printf("\nA keresett azonosito: %d\n",azon);
			printf("A hozzatartozo nev: %s\n",adat.nev[megvan]);
			printf("A hozzatartozo osztalyzat: %d\n\n",adat.szam[megvan]);
			printf("Valoban szeretne torolni?(0:megse, 1:igen): ");
			scanf("%d",&valoban);
			if (valoban==1){
				i=megvan;
				while(i<vege-1)	{
					adat.id[i]=adat.id[i+1];
					k=0;
					while(k!=80){
						adat.nev[i][k]=adat.nev[i+1][k];
						k++;
					}
					adat.szam[i]=adat.szam[i+1];
					if (i==vege){
						adat.id[i]='\0';
						k=0;
						while(k!=80){
							adat.nev[i][k]='\0';
							k++;
						}
						adat.szam[i]='\0';
					}
					i++;
				}
				vege--;
				printf("\nTOROLVE\n\n");
			}
	}
		else {
		printf("Nincs ilyen azonosito\n");
	}
		printf("Masik torlese(1) vagy vissza a fomenube(0)?\n");
		scanf("%d",&ujra);
		CLEAR;
}
while(ujra==true);	
return adat;
}

adatok listazas(adatok adat){
	int i=0;
	int j=0;
	int c;
	char e;
			for(i=0;i<vege-1;i++)
		for(j=0;j<vege-i-1;j++)
		if (adat.id[j]>adat.id[j+1]){
			c=adat.id[j];
			adat.id[j]=adat.id[j+1];
			adat.id[j+1]=c;
			k=0;
			while(k!=80)
			{
			
			e=adat.nev[j][k];
			adat.nev[j][k]=adat.nev[j+1][k];
			adat.nev[j+1][k]=e;
			k++;
		}
			c=adat.szam[j];
			adat.szam[j]=adat.szam[j+1];
			adat.szam[j+1]=c; 
		}
			printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tLISTAZAS\n\n\n");
		printf("________________________________________________________________________________\n");
		printf("Azonosito\t\tNev\t\tOsztalyzat\n");
		printf("________________________________________________________________________________\n");
		for(i=0;i<vege;i++){
			printf("%d\t\t\t%s\t\t%d\n",adat.id[i],adat.nev[i],adat.szam[i]);
		}
		printf("________________________________________________________________________________\n");					//listazas vege
		system("pause");
		CLEAR;
	return adat;
}
