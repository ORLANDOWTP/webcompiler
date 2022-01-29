import java.io.FileWriter;
import java.io.PrintWriter;
import java.io.IOException;
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
try{
FileWriter fileWriter0 = new FileWriter("result.txt",true);
PrintWriter printWriter0 = new PrintWriter(fileWriter0);
printWriter0.printf("%d#%d#%s\n",0,23,myList[i]);
printWriter0.close();
}catch (IOException e){
e.printStackTrace();
}
      }
     
      // Menambahkan semua element
      double total = 0;
      for (int i = 0; i < myList.length; i++) {
         total += myList[i];
try{
FileWriter fileWriter1 = new FileWriter("result.txt",true);
PrintWriter printWriter1 = new PrintWriter(fileWriter1);
printWriter1.printf("%d#%d#%s\n",1,29,total);
printWriter1.close();
}catch (IOException e){
e.printStackTrace();
}
      }
      System.out.println("Total is " + total);
      
      // Mencari max nilai
      double max = myList[0];
      for (int i = 1; i < myList.length; i++) {
         if (myList[i] > max) max = myList[i];
try{
FileWriter fileWriter2 = new FileWriter("result.txt",true);
PrintWriter printWriter2 = new PrintWriter(fileWriter2);
printWriter2.printf("%d#%d#%s\n",2,36,max);
printWriter2.close();
}catch (IOException e){
e.printStackTrace();
}
      }
      System.out.println("Max is " + max);  
   }
}