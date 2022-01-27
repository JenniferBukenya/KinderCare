
#include<stdio.h>


    void Y(){
    for(int i=0; i<7; i++){
        for(int x=0; x<4; x++){

            if((i>=2&&x==2) || (x==0&&i==0)|| (x==1&&i==1)||(x==3&&i==1)){
                printf("*");
            }else if(x==3&&i==0){
            printf(" *");
            }
            else{
            printf("  ");
            }
        }
        printf("\n");
    }
}

   void I(){
       int i, x;
    for( i=0; i<7; i++){

        for(x=0; x<4; x++){
            if(x==2|| i==0|| i==6){
                printf(" * ");
            }else{
            printf("   ");}
        }
        printf("\n");
    }
}

void H(){
    int i, x;
   for(x=0; x<7; x++){

   for(i=0; i<4; i++){
        if(i==0 || i==3|| x==3){
         printf(" * ");
        }else{
        printf("   ");
        }

   }
    printf("\n");
   }
   }

void N(){
char N[7][4];

N[0][0]='*';
N[0][1]=' ';
N[0][2]=' ';
N[0][3]='*';

N[1][0]='*';
N[1][1]=' ';
N[1][2]=' ';
N[1][3]='*';

N[2][0]='*';
N[2][1]='*';
N[2][2]=' ';
N[2][3]='*';

N[3][0]='*';
N[3][1]=' ';
N[3][2]=' ';
N[3][3]='*';

N[4][0]='*';
N[4][1]=' ';
N[4][2]='*';
N[4][3]='*';

N[5][0]='*';
N[5][1]=' ';
N[5][2]=' ';
N[5][3]='*';

N[6][0]='*';
N[6][1]=' ';
N[6][2]=' ';
N[6][3]='*';
int x,i;
    for(i=0; i<7; i++){

        for(x=0; x<4; x++){
            printf(" %c", N[i][x]);
        }
        printf("\n");
    }
}




int main(){

 //N(); printf("\n"); I(); printf("\n"); H();
/*char Z[7][4];
Z[2][2]='*';
Z[5][1]='*';
*/
int i, x;
 for(i=0; i<7; i++){
    for(x=0; x<4; x++){
            if((x==2&&i==1)){
                printf("  *");
            }
            else if((x==1&&i==5)||(x==2&&i==3)){
            printf("* ");
            }
        else if(i==0||i==6|| (x==2&&i==2)||(x==1&&i==4)){
            printf(" * ");

        }else{
            printf("   ");
            }
    }
    printf("\n");
 }

 printf("\n");

 I(); //printf("\n");
H(); //printf("\n");
 N(); //printf("\n");
}
