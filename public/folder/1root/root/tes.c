#include <stdio.h>

/* ------------------------------------------------------ */
/*                 Array 1 Dimensi                        */
/* SNIPPET MENGENAI SUATU ARRAY DALAM BAHASA PEMOGRAMAN C */
/* ------------------------------------------------------ */
 
int main () {

   int n[ 10 ]; /* n adalah sebuah array dengan kapasitas 10 integer */
   int i,j;
 
   /* Looping elemen dari array n dari 0 sampai < 10 */         
   for ( i = 0; i < 10; i++ ) {
      n[ i ] = i + 100; /* Set elemen pada lokasi i menjadi i + 100 */
   }
   
   /* Print output tiap elemen array dengan Looping */
   for (j = 0; j < 10; j++ ) {
      printf("Element[%d] = %d\n", j, n[j] );
   }
 
   return 0;
}