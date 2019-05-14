#include <stdio.h>
#include <stdlib.h>

#ifdef __WIN32__
#define CLEAR system("cls");
#else
#define CLEAR system("clear");
#endif

struct adatok{
	int id;
	int szam;
	char nev[80];
};

void ujadat(FILE *bin,adatok adat);
void listazas(FILE *bin, adatok adat);
void kereses(FILE *bin, adatok adat);
//adatok adatmodositas(adatok adat, FILE *bin);
//adatok torles(adatok adat, FILE *bin);*/
	
	int biztos=0;
	int k;	

int main(){
	adatok adat;
	int valaszt;
	FILE *bin;
	bin=fopen("adatbazis.bin","r+b");
	if (bin==NULL) bin=fopen("adatbazis.bin","w+b");
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
  		ujadat(bin, adat);
}
else							//uj adat vege
	if (valaszt==5)	{		//listazas eleje
		listazas(bin, adat);
}
else							//listazas vege
	if (valaszt==2){		//kereses eleje
		kereses(bin, adat);
}/*
else							//kereses vege	
	if (valaszt==3){		//adatm. eleje
		adat=adatmodositas(adat,bin);
}
else							//adatm. vege
	if (valaszt==4){		//torles eleje
		adat=torles(adat,bin);
}*/							//torles vege
}
	while(valaszt!=6);
	printf("Biztosan kilep?(0:nem, 1:igen): ");
	scanf("%d",&biztos);
	CLEAR;
}
while (biztos!=1);
fclose(bin);
}

void ujadat(FILE *bin, adatok adat){
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
		fseek(bin,0,SEEK_SET);
		fread(&adat,sizeof(adatok),1,bin);
		while(!feof(bin))
		{
			if (adat.id==azon)
			{
			 van=true;
			 break;
			}
			fread(&adat,sizeof(adatok),1,bin);			
		}
		if (van==true){
		 printf("Ilyen mar van\n");
		 printf("Masik azonosito megadasa(1) vagy vissza a fomenube(0)?\n");
		 scanf("%d",&ujra);
			}
		else {
		adat.id=azon;
		 printf("Adja meg a nevet: ");
		 scanf("%s",adat.nev);
		 printf("Adja meg az osztalyzatot: ");
		 scanf("%d",&adat.szam);
		 while(adat.szam>5 || adat.szam<1)
		 {
		 	printf("HIBA!!! Az osztalyzatnak 1 es 5 kozott kell lennie!\n");
		 	printf("Adja meg az osztalyzatot: ");
			scanf("%d",&adat.szam);
		 }
		 fwrite(&adat,sizeof(adatok),1,bin);
		 printf("\nMENTVE\n\n");
	 	 printf("Ujabb adat bevitele(1) vagy vissza a fomenube(0)?\n");
		 scanf("%d",&ujra);	
		}
		CLEAR;
	}
	while(ujra==true);
}
/*
adatok adatmodositas(adatok adat, FILE *bin){
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
*/
void kereses(FILE *bin, adatok adat){	
	bool ujra=false;
	bool van=false;
	int azon=0;
	do{
		van=false;
		ujra=false;
		printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tKERESES\n\n\n");
	
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		fseek(bin,0,SEEK_SET);
		fread(&adat,sizeof(adatok),1,bin);
		while(!feof(bin))
		{
			if (adat.id==azon)
			{			
			 van=true;
			 break;
			}
			fread(&adat,sizeof(adatok),1,bin);			
		}
		if (van==true) {
			printf("\nA keresett azonosito: %d\n",azon);
			printf("A hozzatartozo nev: %s\n",adat.nev);
			printf("A hozzatartozo osztalyzat: %d\n\n",adat.szam);
		}
		else{
		 	printf("Nincs ilyen azonosito\n");
		}
		printf("Uj kereses(1) vagy vissza a fomenube(0)?\n");
		scanf("%d",&ujra);
		CLEAR;
	}
	while(ujra==true);	
}
/*
adatok torles(adatok adat, FILE *bin){
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
*/
void listazas(FILE *bin, adatok adat){

		printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tLISTAZAS\n\n\n");
		printf("________________________________________________________________________________\n");
		printf("Azonosito\t\tNev\t\tOsztalyzat\n");
		printf("________________________________________________________________________________\n");
		fseek(bin,0,SEEK_SET);
		fread(&adat,sizeof(adatok),1,bin);
    	while(!feof(bin))
    	{
       		printf("%9d%18s%23d\n",adat.id,adat.nev,adat.szam); 
       		fread(&adat,sizeof(adatok),1,bin); 
    	}
		printf("________________________________________________________________________________\n");					//listazas vege
		system("pause");
		CLEAR;
}
