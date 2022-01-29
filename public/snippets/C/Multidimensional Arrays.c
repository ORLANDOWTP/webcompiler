#include <stdio.h>

/* ------------------------------------------------------ */
/*                 Array Multidimensi                     */
/* SNIPPET MENGENAI SUATU ARRAY DALAM BAHASA PEMOGRAMAN C */
/* ------------------------------------------------------ */
 
int main () {

   /* Berikut merupakan sebuah array dengan 5 baris dan 2 kolom */
   int a[5][2] = { {0,0}, {1,2}, {2,4}, {3,6},{4,8} };
   int i, j;
 
   /* Print output untuk setiap nilai elemen dari array tersebut */
   for ( i = 0; i < 5; i++ ) {

      for ( j = 0; j < 2; j++ ) {
         printf("a[%d][%d] = %d\n", i,j, a[i][j] );
      }
   }

   return 0;

   
    /* Jadi, dapat disimpulkan :
   _____________________________________
   |  a[0][0] = 0    |     a[3][0] = 3 |
   |  a[0][1] = 1    |     a[3][1] = 6 |
   |  a[1][0] = 1    |     a[4][0] = 4 |
   |  a[1][1] = 2    |     a[4][1] = 8 |
   |  a[2][0] = 2    |                 |
   |  a[2][1] = 4    |                 |
   |_________________|_________________|

   */
}