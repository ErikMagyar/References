#include <stdio.h>
#include <stdlib.h>

#ifdef __WIN32__
#define CLEAR system("cls");
#else
#define CLEAR system("clear");
#endif

struct adatok{
	int id;
	char nev[80];
	int szam;
};

struct lista{
    int id;
    int hanyadik=0;
    struct lista *kovetkezo;
};

void ujadat(FILE *bin,adatok adat);
void listazas(FILE *bin, adatok adat);
void kereses(FILE *bin, adatok adat);
void adatmodositas(FILE *bin, adatok adat);
void torles(FILE *bin, adatok adat);
	
	int biztos=0;
	int k;
	int darab=0;		
	
struct lista *uj,  *elso=NULL, *aktualis, *elozo;

int main(){
	adatok adat;

	int valaszt;
	FILE *bin;
	bin=fopen("adatbazis.bin","r+b");
	if (bin==NULL) bin=fopen("adatbazis.bin","w+b");
	
	fseek(bin,0,SEEK_SET);
	fread(&adat,sizeof(adatok),1,bin);
while(!feof(bin))
{
	uj=(lista *)malloc(sizeof(struct lista));
	if (!uj)
	{
	    printf("Nincs elég memória!\n");
	    system("pause");
	    break;
	}
	elozo=NULL;
	aktualis=elso;
	uj->id=adat.id;
	while(aktualis && adat.id>aktualis->id)
	{
		elozo=aktualis;
		aktualis=aktualis->kovetkezo;    
	}
	if(!elozo) elso=uj;
	else elozo->kovetkezo=uj; 
	uj->kovetkezo=aktualis;
		
	uj->hanyadik=darab;
	darab++;
	fread(&adat,sizeof(adatok),1,bin);	
}	
	
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

	if (valaszt==1){		
  		ujadat(bin, adat);
}
else							
	if (valaszt==5)	{		
		listazas(bin, adat);
}
else						
	if (valaszt==2){	
		kereses(bin, adat);
}
else							
	if (valaszt==3){		
		adatmodositas(bin, adat);
}
else						
	if (valaszt==4){	
		torles(bin, adat);
}							
}
	while(valaszt!=6);
	printf("Biztosan kilep?(0:nem, 1:igen): ");
	scanf("%d",&biztos);
	CLEAR;
}
while (biztos!=1);

//fájlmásolás
FILE *tmp;
tmp=fopen("temp.bin","w+b");
aktualis=elso;
		while(aktualis)
		{
			fseek(bin,0,SEEK_SET);
			fread(&adat,sizeof(adatok),1,bin);
			while(adat.id!=aktualis->id)
			{
				fread(&adat,sizeof(adatok),1,bin);
			}
			if(adat.id>0)
    		{
       			fwrite(&adat,sizeof(adatok),1,tmp);
			}
			aktualis=aktualis->kovetkezo;
		}
fclose(tmp);
fclose(bin);
remove("adatbazis.bin");

//visszamásolás
bin=fopen("adatbazis.bin","w+b");
tmp=fopen("temp.bin","r+b");
aktualis=elso;
		while(aktualis)
		{
			fseek(tmp,0,SEEK_SET);
			fread(&adat,sizeof(adatok),1,tmp);
			while(adat.id!=aktualis->id)
			{
				fread(&adat,sizeof(adatok),1,tmp);
			}
			if(adat.id>0)
    		{
       			fwrite(&adat,sizeof(adatok),1,bin);
			}
			aktualis=aktualis->kovetkezo;
		}
fclose(tmp);
fclose(bin);
remove("temp.bin");
}

void ujadat(FILE *bin, adatok adat){
	bool ujra=false;
	bool van=false;
	int azon=0;
	int i=0;
	do{
		printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tUJADAT BEVITEL\n\n\n");
		ujra=false;
		van=false;	
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		
		fseek(bin,0,SEEK_END);
		
		while(azon<1)
		{
			printf("Az azonositonak nagyobbnak kell lennie, mint 0!\n");
			printf("Adja meg ujra az azonositot: ");
			scanf("%d",&azon);
		}
		fflush(stdin);
		
		aktualis=elso;
		while(aktualis)
		{
			if(azon==aktualis->id)
			{
				van=true;
				break;
			}
			aktualis=aktualis->kovetkezo;
		}
		
		if (van==true){
		 printf("Ilyen mar van\n");
		 printf("Masik azonosito megadasa(1) vagy vissza a fomenube(0)?\n");
		 scanf("%d",&ujra);
			}
		else {	
			uj=(lista *)malloc(sizeof(struct lista));
			if (!uj)
	        {
	            printf("Nincs elég memória!\n");
	            system("pause");
	            break;
	        }
	        elozo=NULL;
	        aktualis=elso;
	        uj->id=azon;
	        while(aktualis && azon>aktualis->id)
			{
			    elozo=aktualis;
			    aktualis=aktualis->kovetkezo;    
			}
			if(!elozo) elso=uj;
			else elozo->kovetkezo=uj; 
			uj->kovetkezo=aktualis;
			
			
			adat.id=azon;
		 	printf("Adja meg a nevet: ");
		 	while((adat.nev[i]=getchar())!='\n' && adat.nev[i]!=EOF)
			 {
		 		i++;
			 }
		 	adat.nev[i]='\0';
			 
			 
			 printf("Adja meg az osztalyzatot: ");
			 scanf("%d",&adat.szam);
			 while(adat.szam>5 || adat.szam<1)
			 {
			 	printf("HIBA!!! Az osztalyzatnak 1 es 5 kozott kell lennie!\n");
			 	printf("Adja meg ujra az osztalyzatot: ");
				scanf("%d",&adat.szam);
			 }
			 fwrite(&adat,sizeof(adatok),1,bin);
			 
				uj->hanyadik=darab;
				darab++;
			
			 printf("\nMENTVE\n\n");
		 	 printf("Ujabb adat bevitele(1) vagy vissza a fomenube(0)?\n");
			 scanf("%d",&ujra);
			 
			
			}
		CLEAR;
	}
	while(ujra==true);
}

void adatmodositas(FILE *bin, adatok adat){
	bool ujra=false;
	bool van=false;
	int azon=0;
	int megvan=0;
	int ujszam;
	int mode=0;
	int i=0;
	char ujnev[80];
	do{
		van=false;
		ujra=false;
		mode=0;
		printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tADATMODOSITAS\n\n\n");
		
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		while(azon<1)
		{
			printf("Az azonositonak nagyobbnak kell lennie, mint 0!\n");
			printf("Adja meg ujra az azonositot: ");
			scanf("%d",&azon);
		}
		
		aktualis=elso;
	    while(aktualis)
	    {
	        if(azon==aktualis->id)
	        {
	            van=true;
	            break;    
	        }
	        aktualis=aktualis->kovetkezo;    
	    }

		if (van==true) {
			
			fseek(bin,aktualis->hanyadik*sizeof(adatok),SEEK_SET);
			fread(&adat,sizeof(adatok),1,bin);
			
			printf("\nA keresett azonosito: %d\n",adat.id);
			printf("A hozzatartozo nev: %s\n",adat.nev);
			printf("A hozzatartozo osztalyzat: %d\n\n",adat.szam);
			printf ("Valoban szeretne modositani?(0:megse, 1:igen): ");
			scanf("%d",&mode);
			if (mode==1)
			{
				printf("Az uj nev: ");
				fflush(stdin);
				while((adat.nev[i]=getchar())!='\n' && adat.nev[i]!=EOF)
		 		{
		 			i++;
				}
				adat.nev[i]='\0';
				printf("Az uj osztalyzat: ");
				scanf("%d",&ujszam);
				while(ujszam>5 || ujszam<1)
				{
				 	printf("HIBA!!! Az osztalyzatnak 1 es 5 kozott kell lennie!\n");
				 	printf("Adja meg ujra az uj osztalyzatot: ");
					scanf("%d",&ujszam);
				}
				adat.szam=ujszam;
				fseek(bin,-1*sizeof(adatok),SEEK_CUR);
				fwrite(&adat,sizeof(adatok),1,bin);
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
}

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
		while(azon<1)
		{
			printf("Az azonositonak nagyobbnak kell lennie, mint 0!\n");
			printf("Adja meg ujra az azonositot: ");
			scanf("%d",&azon);
		}
		
	    aktualis=elso;
	    while(aktualis)
	    {
	        if(azon==aktualis->id)
	        {
	            van=true;
	            break;    
	        }
	        aktualis=aktualis->kovetkezo;    
	    }

		if (van==true) {
			
			fseek(bin,aktualis->hanyadik*sizeof(adatok),SEEK_SET);
			fread(&adat,sizeof(adatok),1,bin);
			
			printf("\nA keresett azonosito: %d\n",adat.id);
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

void torles(FILE *bin, adatok adat){
	bool ujra=false;
	bool van=false;
	int azon=0;
	int valoban=0;
	do{
		van=false;
		valoban=0;
		ujra=false;
		printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tTORLES\n\n\n");		
		printf("Adja meg az azonositot: ");
		scanf("%d",&azon);
		while(azon<1)
		{
			printf("Az azonositonak nagyobbnak kell lennie, mint 0!\n");
			printf("Adja meg ujra az azonositot: ");
			scanf("%d",&azon);
		}
		
	    aktualis=elso;
	    while(aktualis)
	    {
	        if(azon==aktualis->id)
	        {
	            van=true;
	            break;    
	        }
	        aktualis=aktualis->kovetkezo;    
	    }
		if (van==true) {
			
			fseek(bin,aktualis->hanyadik*sizeof(adatok),SEEK_SET);
			fread(&adat,sizeof(adatok),1,bin);
		
			printf("\nA keresett azonosito: %d\n",adat.id);
			printf("A hozzatartozo nev: %s\n",adat.nev);
			printf("A hozzatartozo osztalyzat: %d\n\n",adat.szam);
			printf ("Valoban szeretne torolni?(0:megse, 1:igen): ");
			scanf("%d",&valoban);
			if (valoban==1)
			{
				aktualis=elso;
			    elozo=NULL;
			    while(aktualis)
			    {
			        if(azon==aktualis->id)
			        {
			            if(!elozo)
			            {
			                elso=aktualis->kovetkezo;    
			            }
			            else
			            {
			                elozo->kovetkezo=aktualis->kovetkezo;    
			            }
			            free(aktualis);           
			            break;
			        }
			        elozo=aktualis;
			        aktualis=aktualis->kovetkezo; 	      
			    }
			    adat.id=-1*adat.id;
			}
			printf("\nMENTVE\n\n");
		}
		else{
		 	printf("Nincs ilyen azonosito\n");
		}
		printf("Masik torlese(1) vagy vissza a fomenube(0)?\n");
		scanf("%d",&ujra);
		CLEAR;
}
while(ujra==true);	
}

void listazas(FILE *bin, adatok adat){

		printf("\t\t\tADATNYILVANTARTO PROGRAM\n\n");
		printf("\t\t\tLISTAZAS\n\n\n");
		printf("________________________________________________________________________________\n");
		printf("Azonosito\t\tNev\t\tOsztalyzat\n");
		printf("________________________________________________________________________________\n");
		aktualis=elso;
		while(aktualis)
		{
			fseek(bin,aktualis->hanyadik*sizeof(adatok),SEEK_SET);
			fread(&adat,sizeof(adatok),1,bin);
			printf("%9d%18s%23d\n",adat.id,adat.nev,adat.szam);
			aktualis=aktualis->kovetkezo;
		}
		printf("________________________________________________________________________________\n");				
		system("pause");
		CLEAR;
}
