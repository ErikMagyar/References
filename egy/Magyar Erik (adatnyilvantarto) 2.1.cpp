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

void ujadat();
void listazas();
void kereses();
void adatmodositas();
void torles();

	adatok adat;
	char e,ujnev[80];
	int i=0,j=0,azon=0,vege=0,van=0,c,k,megvan=0,biztos=0,ujszam,valoban=0,valaszt,ujra=0,mode=0;

int main(){

	
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
  ujadat();
}							//uj adat vege
	if (valaszt==5)	{		//listazas eleje
		listazas();
}							//listazas vege
	if (valaszt==2){		//kereses eleje
		kereses();
}							//kereses vege	
	if (valaszt==3){		//adatm. eleje
		adatmodositas();
}							//adatm. vege
	if (valaszt==4){		//torles eleje
		torles();
}							//torles vege
}
	while(valaszt!=6);
	printf("Biztosan kilep?(0:nem, 1:igen): ");
	scanf("%d",&biztos);
	CLEAR;
}
while (biztos!=1);
}

void ujadat(){
	do{
				printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tUJADAT BEVITEL\n\n\n");
		ujra=0;
		van=0;	
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (i=0;i<vege;i++)
		if (adat.id[i]==azon) van=1;
		if (van==1){
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
	while(ujra==1);
}

void adatmodositas(){
	do{
			van=0;
			mode=0;
			printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tADATMODOSITAS\n\n\n");
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (i=0;i<vege;i++)
		if (adat.id[i]==azon) {
			van=1;
			megvan=i;
		}
		if (van==1) {
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
		van=0;
		printf("Masik adat modositasa(1) vagy vissza a fomenube(0)?\n");
		scanf("%d",&ujra);
		CLEAR;
}
	while(ujra==1);	
}

void kereses(){	
	do{
			van=0;
			ujra=0;
			printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tKERESES\n\n\n");

	
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (i=0;i<vege;i++)
		if (adat.id[i]==azon) {
			van=1;
			megvan=i;
		}
		if (van==1) {
			printf("\nA keresett azonosito: %d\n",azon);
			printf("A hozzatartozo nev: %s\n",adat.nev[megvan]);
			printf("A hozzatartozo osztalyzat: %d\n\n",adat.szam[megvan]);
		}
		else{
		 	printf("Nincs ilyen azonosito\n");
		}
		printf("Uj kereses(1) vagy vissza a fomenube(0)?\n");
		scanf("%d",&ujra);
		van=0;
		CLEAR;
	}
	while(ujra==1);	
}

void torles(){
	do{
		van=0;
		valoban=0;
		ujra=0;
		printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tTORLES\n\n\n");
	
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (i=0;i<vege;i++)
		if (adat.id[i]==azon) {
			van=1;
			megvan=i;
		}
		if (van==1) {
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
		van=0;
		printf("Masik torlese(1) vagy vissza a fomenube(0)?\n");
		scanf("%d",&ujra);
		CLEAR;
}
while(ujra==1);	
}

void listazas(){
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
		i=0;
		j=0;
}
