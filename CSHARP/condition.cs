using System;

namespace MyApplication
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("What time is it? ");
            int time = Convert.ToInt32(Console.ReadLine());
            // time = 10;
            if (time < 10)
            {
                Console.WriteLine("Good Morning VIEEEETNAAAAAAAM!");
            }
            else if (time < 20)
            {
                Console.WriteLine("Good Day!");
            }
            else
            {
                Console.WriteLine("Good evening!");
            }
        }
    }
}
