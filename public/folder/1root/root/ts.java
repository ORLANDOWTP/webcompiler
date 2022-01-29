/* -------------------------------------------------------- */
/*          Cara Deklarasi Array pada Bahasa Java           */
/* -------------------------------------------------------- */
/*        dataType[] arrayRefVar;   // Sangat dianjurkan    */
/*                            or                            */
/*  dataType arrayRefVar[];  // Tidak dianjurkan tapi bisa  */
/* -------------------------------------------------------- */

/* ----------------------------------------------------------- */
/*                2 Cara Membuat Array                         */
/* ----------------------------------------------------------- */
/* 1.) dataType[] arrayRefVar = new dataType[arraySize];       */
/* 2.) dataType[] arrayRefVar = {value0, value1, ..., valueN}; */
/* ----------------------------------------------------------- */

public class ts {

   public static void main(String[] args) {
      double[] myList = {1.9, 2.9, 3.4, 3.5};

      // Print semua elemen dari array
      for (int i = 0; i < myList.length; i++) {
         System.out.println(myList[i] + " ");
      }
     
      // Menambahkan semua element
      double total = 0;
      for (int i = 0; i < myList.length; i++) {
         total += myList[i];
      }
      System.out.println("Total is " + total);
      
      // Mencari max nilai
      double max = myList[0];
      for (int i = 1; i < myList.length; i++) {
         if (myList[i] > max) max = myList[i];
      }
      System.out.println("Max is " + max);  
   }
}