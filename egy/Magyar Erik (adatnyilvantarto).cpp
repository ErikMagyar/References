#include <stdio.h>
#include <stdlib.h>

#ifdef __WIN32__
#define CLEAR system("cls");
#else
#define CLEAR system("clear");
#endif

int main(){
	int id[255],szam[255];
	char nev[255][80];
	char e,ujnev[80];
	int i=0,j=0,azon=0,vege=0,van=0,c,k,megvan=0,biztos=0,ujszam,valoban=0,valaszt;
	
do {

	do {
	printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n\n");
	printf("funkciok:\n\n");
	printf("1.	Ujadat bevitel\n");
	printf("2.	Kereses\n");
	printf("3.	Adatmodositas\n");
	printf("4.	Torles\n");
	printf("5.	Listazas\n");
	printf("6.	Kilepes\n\n");
	printf("Valasszon: ");
	scanf("%d",&valaszt);
	
	CLEAR;

	if (valaszt==1){									//   uj adat kezdete
			printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tUJADAT BEVITEL\n\n\n");
	do{
		van=0;
	
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (i=0;i<vege;i++)
		if (id[i]==azon) van=1;
		if (van==1){
		 printf("Ilyen mar van\n");
	}
		else {
		id[vege]=azon;
		 printf("Adja meg a nevet: ");
		 scanf("%s",nev[vege]);
		 printf("Adja meg az osztalyzatot: ");
		 scanf("%d",&szam[vege]);
		 vege++;
}
}
	while(van!=0);
CLEAR;
}														//uj adat vege


	if (valaszt==5)	{								//listazas eleje
		for(i=0;i<vege-1;i++)
		for(j=0;j<vege-i-1;j++)
		if (id[j]>id[j+1]){
			c=id[j];
			id[j]=id[j+1];
			id[j+1]=c;
			k=0;
			while(k!=80)
			{
			
			e=nev[j][k];
			nev[j][k]=nev[j+1][k];
			nev[j+1][k]=e;
			k++;
		}
			c=szam[j];
			szam[j]=szam[j+1];
			szam[j+1]=c; 
		}
			printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tLISTAZAS\n\n\n");
		printf("________________________________________________________________________________\n");
		printf("Azonosito\t\tNev\t\tOsztalyzat\n");
		printf("________________________________________________________________________________\n");
		for(i=0;i<vege;i++){
			printf("%d\t\t\t%s\t\t%d\n",id[i],nev[i],szam[i]);
		}
		printf("________________________________________________________________________________\n");					//listazas vege
		system("pause");
		CLEAR;
		i=0;
		j=0;
	}
	if (valaszt==2){															//kereses eleje
		van=0;
			printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tKERESES\n\n\n");
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (i=0;i<vege;i++)
		if (id[i]==azon) {
			van=1;
			megvan=i;
		}
		if (van==1) {
			printf("\nA keresett azonosito: %d\n",azon);
			printf("A hozzatartozo nev: %s\n",nev[megvan]);
			printf("A hozzatartozo osztalyzat: %d\n\n",szam[megvan]);
		}
		else printf("Nincs ilyen azonosito\n");
		system("pause");
		van=0;
		CLEAR;
	}																			//kereses vege
	
	
		if (valaszt==3){														//adatm. eleje
		van=0;
			printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tADATMODOSITAS\n\n\n");
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (i=0;i<vege;i++)
		if (id[i]==azon) {
			van=1;
			megvan=i;
		}
		if (van==1) {
			printf("\nA keresett azonosito: %d\n",azon);
			printf("A hozzatartozo nev: %s\n",nev[megvan]);
			printf("A hozzatartozo osztalyzat: %d\n\n",szam[megvan]);
			printf("Az uj nev: ");
			scanf("%s",&ujnev);
			k=0;
			while(k!=80){
			nev[megvan][k]=ujnev[k];
			k++;
		}
			printf("\nAz uj osztalyzat: ");
			scanf("%d",&ujszam);
			szam[megvan]=ujszam;
			}
		else{
		 printf("Nincs ilyen azonosito\n");
		system("pause");
	}
		van=0;
		CLEAR;																//adatm. vege
	}
	
	if (valaszt==4){
				van=0;
				valoban=0;
			printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tTORLES\n\n\n");
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		for (i=0;i<vege;i++)
		if (id[i]==azon) {
			van=1;
			megvan=i;
		}
		if (van==1) {
			printf("\nA keresett azonosito: %d\n",azon);
			printf("A hozzatartozo nev: %s\n",nev[megvan]);
			printf("A hozzatartozo osztalyzat: %d\n\n",szam[megvan]);
			printf("Valoban szeretne torolni?(0:nem, 1:igen): ");
			scanf("%d",&valoban);
			if (valoban==1){
				i=megvan;
				while(i<vege-1)	{
					id[i]=id[i+1];
					k=0;
					while(k!=80){
						nev[i][k]=nev[i+1][k];
						k++;
					}
					szam[i]=szam[i+1];
					if (i==vege){
						id[i]='\0';
						k=0;
						while(k!=80){
							nev[i][k]='\0';
							k++;
						}
						szam[i]='\0';
					}
					i++;
				}
				vege--;
			}
	}
		else {
		printf("Nincs ilyen azonosito\n");
		system("pause");
	}
		van=0;
		CLEAR;
}

}
	while(valaszt!=6);
	printf("Biztosan kilep?(0:nem, 1:igen): ");
	scanf("%d",&biztos);
	CLEAR;
}
while (biztos!=1);
}
