using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace tologatos
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        //application ready
        private void Form1_Load(object sender, EventArgs e)
        {
            kezdes();
            init2();
            formSettings();

        }

        private void init2()
        {
            for (int i = 0; i < n; i++)
            {
                for (int j = 0; j < n; j++)
                {
                    cellW = ClientSize.Width / n;
                    cellH = ClientSize.Height / n;

                    cells[i, j].Width = cellW;
                    cells[i, j].Height = cellH;
                    cells[i, j].Left = j * cellW;
                    cells[i, j].Top = i * cellH;

                    if (i==0 && (j!=0 && j!=n-1))
                    {
                        cells[i, j].Image = Properties.Resources.egyenescso2;
                    }
                    if (j==0 && (i!=0 && i!=n-1))
                    {
                        cells[i, j].Image = Properties.Resources.egyenescso3;
                    }
                    if (j==0 && i==0)
                    {
                        cells[i, j].Image = Properties.Resources.gorbecsobalfelso;
                    }
                    if (j==n-1 && i==0)
                    {
                        cells[i, j].Image = Properties.Resources.gorbecsojobbfelso;
                    }
                    if (j==0 && i==n-1)
                    {
                        cells[i, j].Image = Properties.Resources.gorbecsobalalso;
                    }
                    if (j==n-1 && i==n-1)
                    {
                        cells[i, j].Image = Properties.Resources.gorbecsojobbalso;
                    }
                    if (j==n-1 && (i!=0 && i!=n-1))
                    {
                        cells[i, j].Image = Properties.Resources.egyenescso31;
                    }
                    if (i==n-1 && (j!=0 && j!=n-1))
                    {
                        cells[i, j].Image = Properties.Resources.egyenescso21;
                    }
                }
            }
            hero.Visible = false;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            n = 10;
            for (int i=0;i<n;i++)
            {
                for (int j=0;j<n;j++)
                {
                    matrix[i, j] = matrix1[i, j];
                }
            }
            init();
            gomboknemlatszanak();
            akt_palya = 1;

        }
        private void button2_Click(object sender, EventArgs e)
        {
            n = 10;
            for (int i = 0; i < n; i++)
            {
                for (int j = 0; j < n; j++)
                {
                    matrix[i, j] = matrix2[i, j];
                }
            }
            init();
            gomboknemlatszanak();
            akt_palya = 2;
        }
        private void button3_Click(object sender, EventArgs e)
        {
            n = 10;
            for (int i = 0; i < n; i++)
            {
                for (int j = 0; j < n; j++)
                {
                    matrix[i, j] = matrix3[i, j];
                }
            }
            init();
            gomboknemlatszanak();
            akt_palya = 3;
        }
        private void button4_Click(object sender, EventArgs e)
        {
            n = 10;
            for (int i = 0; i < n; i++)
            {
                for (int j = 0; j < n; j++)
                {
                    matrix[i, j] = matrix4[i, j];
                }
            }
            init();
            gomboknemlatszanak();
            akt_palya = 4;
        }
        private void button5_Click(object sender, EventArgs e)
        {
            n = 10;
            for (int i = 0; i < n; i++)
            {
                for (int j = 0; j < n; j++)
                {
                    matrix[i, j] = matrix5[i, j];
                }
            }
            init();
            gomboknemlatszanak();
            akt_palya = 5;
        }
        private void button6_Click(object sender, EventArgs e)
        {
            n = 10;
            for (int i = 0; i < n; i++)
            {
                for (int j = 0; j < n; j++)
                {
                    matrix[i, j] = matrix6[i, j];
                }
            }
            init();
            gomboknemlatszanak();
            akt_palya = 6;
        }
        private void button7_Click(object sender, EventArgs e)
        {
            n = 10;
            for (int i = 0; i < n; i++)
            {
                for (int j = 0; j < n; j++)
                {
                    matrix[i, j] = matrix7[i, j];
                }
            }
            init();
            gomboknemlatszanak();
            akt_palya = 7;
        }
        private void button8_Click(object sender, EventArgs e)
        {
            n = 10;
            for (int i = 0; i < n; i++)
            {
                for (int j = 0; j < n; j++)
                {
                    matrix[i, j] = matrix8[i, j];
                }
            }
            init();
            gomboknemlatszanak();
            akt_palya = 8;
        }

        //valtozok
        PictureBox[,] cells;
        int n = 10;
        int cellW, cellH;
        int heroX, heroY;
        PictureBox hero;
        int[] pontok= {0,10,20,30,40,50,60,70,80,90,100,110,120};
        int akt_palya;
        int ossz_pontok = 0;
        int[,] matrix ={
                {0,0,0,0,0,0,0,0,0,0 },
                {0,0,0,0,0,0,0,0,0,0 },
                {0,0,0,0,0,0,0,0,0,0 },
                {0,0,0,0,0,0,0,0,0,0 },
                {0,0,0,0,0,0,0,0,0,0 },
                {0,0,0,0,0,0,0,0,0,0 },
                {0,0,0,0,0,0,0,0,0,0 },
                {0,0,0,0,0,0,0,0,0,0 },
                {0,0,0,0,0,0,0,0,0,0 },
                {0,0,0,0,0,0,0,0,0,0 }
            };
    //0 üres
    //1 block
    //2 felső cső
    //3 bal cső
    //4 balfelső cső
    //5 jobbfelső cső
    //6 balalsó cső
    //7 jobbalsó cső
    //8 jobb cső
    //9 alsó cső
    //10 feles(a hős betud menni, de block nem)
    //11 void
    //12 ajtó(mindig az 1-1 helyen)
    //13 X
    int[,] matrix1 = {
                {4,2,2,2,2,2,2,2,2,5 },
                {3,12,10,10,10,10,10,10,13,8 },
                {3,10,0,0,0,0,10,10,10,8 },
                {3,10,0,0,0,1,0,10,10,8 },
                {3,10,0,0,0,1,0,0,10,8 },
                {3,10,0,1,1,0,0,0,10,8 },
                {3,10,10,0,0,0,0,0,10,8 },
                {3,10,10,10,0,0,0,11,10,8 },
                {3,13,10,10,10,10,10,10,0,8 },
                {6,9,9,9,9,9,9,9,9,7 }
            };
    int[,] matrix2 = {
                {4,2,2,2,2,2,2,2,2,5 },
                {3,12,0,0,0,0,0,0,0,8 },
                {3,13,1,0,1,0,1,0,0,8 },
                {3,13,0,0,0,0,0,1,0,8 },
                {3,13,0,13,13,13,0,0,0,8 },
                {3,13,0,13,13,13,0,1,0,8 },
                {3,0,0,13,13,13,0,0,0,8 },
                {3,0,0,0,0,0,0,1,0,8 },
                {3,11,13,13,13,13,13,0,0,8 },
                {6,9,9,9,9,9,9,9,9,7 }
            };
      int[,] matrix3 = {
                {4,2,2,2,2,2,2,2,2,5 },
                {3,12,10,13,13,10,0,0,11,8 },
                {3,13,0,0,0,0,0,0,0,8 },
                {3,10,0,1,1,1,1,1,0,8 },
                {3,13,0,1,0,0,0,1,1,8 },
                {3,13,0,1,0,1,1,1,0,8 },
                {3,13,0,0,0,1,0,0,13,8 },
                {3,13,0,1,1,1,0,0,0,8 },
                {3,11,0,0,1,0,0,0,0,8 },
                {6,9,9,9,9,9,9,9,9,7 }
            };
       int[,] matrix4 = {
                {4,2,2,2,2,2,2,2,2,5 },
                {3,12,0,0,13,0,0,13,11,8 },
                {3,0,13,0,0,1,0,0,0,8 },
                {3,0,13,1,0,0,13,0,0,8 },
                {3,0,0,0,1,0,13,13,13,8 },
                {3,13,1,1,0,1,0,0,0,8 },
                {3,13,0,13,13,0,1,0,0,8 },
                {3,13,0,0,13,0,0,1,0,8 },
                {3,11,0,0,13,0,0,0,0,8 },
                {6,9,9,9,9,9,9,9,9,7 }
            };
        int[,] matrix5 = {
                {4,2,2,2,2,2,2,2,2,5 },
                {3,12,0,0,0,0,0,0,13,8 },
                {3,13,0,1,0,0,1,0,13,8 },
                {3,13,13,0,13,13,13,0,13,8 },    
                {3,0,0,1,0,0,0,0,0,8 },
                {3,0,1,1,0,13,13,13,13,8 },
                {3,0,0,0,0,0,0,0,0,8 },
                {3,13,0,1,0,0,0,1,0,8 },
                {3,11,1,0,1,0,1,0,0,8 },
                {6,9,9,9,9,9,9,9,9,7 }
            };
        int[,] matrix6 = {
                {4,2,2,2,2,2,2,2,2,5 },
                {3,12,0,0,0,0,13,13,13,8 },
                {3,0,0,13,0,0,0,0,0,8 },
                {3,0,13,13,11,13,13,0,0,8 },
                {3,0,0,13,13,0,13,1,13,8 },
                {3,13,1,13,0,0,0,0,0,8 },
                {3,13,0,13,13,13,13,13,0,8 },
                {3,13,0,13,13,0,13,13,0,8 },
                {3,11,0,0,0,0,0,0,0,8 },
                {6,9,9,9,9,9,9,9,9,7 }
            };
        int[,] matrix7 = {
                {4,2,2,2,2,2,2,2,2,5 },
                {3,12,13,0,0,0,13,0,13,8 },
                {3,0,13,13,13,0,13,0,0,8 },
                {3,0,0,13,13,0,13,13,0,8 },
                {3,0,13,13,13,0,0,0,0,8 },
                {3,0,0,13,0,13,13,13,0,8 },
                {3,13,0,13,0,0,13,0,0,8 },
                {3,13,0,13,13,0,13,0,13,8 },
                {3,13,0,0,0,0,0,0,0,8 },
                {6,9,9,9,9,9,9,9,9,7 }
            };
        int[,] matrix8 = {
                {4,2,2,2,2,2,2,2,2,5 },
                {3,12,0,0,0,0,0,0,11,8 },
                {3,11,13,13,0,13,13,0,1,8 },
                {3,1,0,0,0,0,0,13,0,8 },
                {3,0,1,13,13,13,0,13,10,8 },
                {3,1,0,0,0,0,0,0,0,8 },
                {3,0,1,13,13,1,13,0,0,8 },
                {3,1,0,13,13,0,1,1,13,8 },
                {3,11,0,0,0,0,0,0,0,8 },
                {6,9,9,9,9,9,9,9,9,7 }
            };


        //key pressed
        private void Form1_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Left)
            {
                if (matrix[heroY, heroX - 1] == 0 || (matrix[heroY, heroX-1]==1 && matrix[heroY, heroX-2]!=3) || matrix[heroY, heroX - 1] == 10 || matrix[heroY, heroX - 1] == 12)
                {
                    if (matrix[heroY, heroX - 1] == 0 || matrix[heroY, heroX - 1] == 10 || matrix[heroY, heroX - 1] == 12)
                    heroX--;
                    else
                    {
                        if (matrix[heroY, heroX - 2]!= 1 && matrix[heroY, heroX-2] != 10 && matrix[heroY, heroX - 2] !=12)
                        {
                            if (matrix[heroY, heroX - 2] == 11)
                            {
                                heroX--;
                                matrix[heroY, heroX - 1] = 0;
                                matrix[heroY, heroX - 1] = 11;
                                matrix[heroY, heroX] = 0;
                            }
                            else
                            {
                                if (matrix[heroY, heroX - 2] != 13)
                                {
                                    heroX--;
                                    matrix[heroY, heroX] = 0;
                                    matrix[heroY, heroX - 1] = 1;
                                }
                            }
                        }
                    }
                }
            }
            if (e.KeyCode == Keys.Right)
            {
                if (matrix[heroY, heroX + 1] == 0 || (matrix[heroY, heroX + 1] == 1 && matrix[heroY, heroX + 2] != 8) || matrix[heroY, heroX + 1] == 10 || matrix[heroY, heroX + 1] == 12)
                {
                    if (matrix[heroY, heroX + 1] == 0 || matrix[heroY, heroX + 1] == 10 || matrix[heroY, heroX + 1] == 12)
                        heroX++;
                    else
                    {
                        if (matrix[heroY, heroX + 2] != 1 && matrix[heroY, heroX+2] != 10 && matrix[heroY, heroX + 2] != 12)
                        {
                            if (matrix[heroY, heroX + 2] == 11)
                            {
                                heroX++;
                                matrix[heroY, heroX + 1] = 0;
                                matrix[heroY, heroX + 1] = 11;
                                matrix[heroY, heroX] = 0;
                            }
                            else
                            {
                                if (matrix[heroY, heroX + 2] != 13)
                                {
                                    heroX++;
                                    matrix[heroY, heroX] = 0;
                                    matrix[heroY, heroX + 1] = 1;
                                }
                            }
                        }
                    }
                }
            }
            if (e.KeyCode == Keys.Up)
            {
                if (matrix[heroY-1,heroX] ==0 || (matrix[heroY-1,heroX]==1 && matrix[heroY-2, heroX] != 2) || matrix[heroY-1, heroX] == 10 || matrix[heroY-1, heroX] == 12)
                {
                    if (matrix[heroY - 1, heroX] == 0 || matrix[heroY - 1, heroX] == 10 || matrix[heroY-1, heroX] == 12)
                    heroY--;
                    else
                    {
                        if (matrix[heroY - 2, heroX] != 1 && matrix[heroY - 2, heroX] != 10 && matrix[heroY-2, heroX] != 12)
                        {
                            if (matrix[heroY-2, heroX] == 11)
                            {
                                heroY--;
                                matrix[heroY-1, heroX] = 0;
                                matrix[heroY-1, heroX] = 11;
                                matrix[heroY, heroX] = 0;
                            }
                            else
                            {
                                if (matrix[heroY - 2, heroX] != 13)
                                {
                                    heroY--;
                                    matrix[heroY, heroX] = 0;
                                    matrix[heroY - 1, heroX] = 1;
                                }
                            }
                        }
                    }
                }
            }
            if (e.KeyCode == Keys.Down)
            {

                if (matrix[heroY + 1, heroX] == 0 || (matrix[heroY + 1, heroX] == 1 && matrix[heroY + 2, heroX] != 9) || matrix[heroY + 1, heroX] == 10 || matrix[heroY+1, heroX] == 12)
                {
                    if (matrix[heroY + 1, heroX] == 0 || matrix[heroY + 1, heroX] == 10 || matrix[heroY+1, heroX] == 12)
                        heroY++;
                    else
                    {
                        if (matrix[heroY + 2, heroX] != 1 && matrix[heroY + 2, heroX] != 10 && matrix[heroY+2, heroX] != 12)
                        {
                            if (matrix[heroY + 2, heroX] == 11)
                            {
                                heroY++;
                                matrix[heroY + 1, heroX] = 0;
                                matrix[heroY + 1, heroX] = 11;
                                matrix[heroY, heroX] = 0;
                            }
                            else
                            {
                                if (matrix[heroY + 2, heroX] != 13)
                                {
                                    heroY++;
                                    matrix[heroY, heroX] = 0;
                                    matrix[heroY + 1, heroX] = 1;
                                }
                            }
                        }
                    }
                }
            }
            hero.Left = heroX * cellW;
            hero.Top = heroY * cellH;
            if (heroX == 1 && heroY == 1)
            {
                ellenoriz();
            }
            for (int i=heroY-1;i<=heroY+1;i++)
            {
                for (int j = heroX - 1; j <= heroX + 1; j++)
                {
                    if (matrix[i, j] == 1)
                    {
                        cells[i, j].Image = Properties.Resources.negyzetjo;
                    }
                    if (matrix[i, j] == 0)
                    {
                        cells[i, j].Image = Properties.Resources.ures;
                    }
                }
            }
            if (e.KeyCode == Keys.Escape)
            {
                init2();
                gomboklatszanak();
                for (int i = 1; i < n - 1; i++)
                {
                    for (int j = 1; j < n - 1; j++)
                    {
                        cells[i, j].Image = Properties.Resources.ures;
                    }
                }
            }
        }

        private void ellenoriz()
        {
             bool kesz = true;
            for (int i = 0; i < n; i++)
            {
                for (int j=0;j<n;j++)
                {
                    if(matrix[i,j]==1)
                    {
                        kesz = false;
                    }
                }
            }
            if (kesz==true)
            {              
                MessageBox.Show("Gratulálok! Pálya teljesítve! Kaptál "+pontok[akt_palya]+" pontot!");
                init2();
                gomboklatszanak();
                for (int i = 1; i < n - 1; i++)
                {
                    for (int j = 1; j < n - 1; j++)
                    {
                        cells[i, j].Image = Properties.Resources.ures;
                    }
                }
                ossz_pontok = ossz_pontok + pontok[akt_palya];
                if(akt_palya<5)
                pontok[akt_palya] = 1;
                if (akt_palya >= 5)
                    pontok[akt_palya] = 2;
                label1.Text = "Pontjaid: " + ossz_pontok;
            }
            else MessageBox.Show("Még nem távolítottál el minden blockot!");
        }

        private void init()
        {
            heroX =n- 2;
            heroY =n-2;
            hero.Visible = true;

            for (int i = 0; i < n; i++)
            {
                    for (int j = 0; j < n; j++)
                    {
                        cellW = ClientSize.Width / n;
                        cellH = ClientSize.Height / n;

                        cells[i, j].Width = cellW;
                        cells[i, j].Height = cellH;
                        cells[i, j].Left = j * cellW;
                        cells[i, j].Top = i * cellH;

                            if (matrix[i, j] == 1)
                            {
                                cells[i, j].Image = Properties.Resources.negyzetjo;
                            }
                            if (matrix[i, j] == 13)
                            {
                                cells[i, j].Image = Properties.Resources.block;
                            }
                            if (matrix[i, j] == 11)
                            {
                                cells[i, j].Image = Properties.Resources._void;
                            }
                            if (matrix[i, j] == 2)
                            {
                                cells[i, j].Image = Properties.Resources.egyenescso2;
                            }
                            if (matrix[i, j] == 3)
                            {
                                cells[i, j].Image = Properties.Resources.egyenescso3;
                            }
                            if (matrix[i, j] == 4)
                            {
                                cells[i, j].Image = Properties.Resources.gorbecsobalfelso;
                            }
                            if (matrix[i, j] == 5)
                            {
                                cells[i, j].Image = Properties.Resources.gorbecsojobbfelso;
                            }
                            if (matrix[i, j] == 6)
                            {
                                cells[i, j].Image = Properties.Resources.gorbecsobalalso;
                            }
                            if (matrix[i, j] == 7)
                            {
                                cells[i, j].Image = Properties.Resources.gorbecsojobbalso;
                            }
                            if (matrix[i, j] == 8)
                            {
                                cells[i, j].Image = Properties.Resources.egyenescso31;
                            }
                            if (matrix[i, j] == 9)
                            {
                                cells[i, j].Image = Properties.Resources.egyenescso21;
                            }
                            if (matrix[i, j] == 12)
                            {
                                cells[i, j].Image = Properties.Resources.kesz;
                            }
                            if (matrix[i, j] == 10)
                            {
                                cells[i, j].Image = Properties.Resources.atmenet;
                            }
                }
            }      
            hero.Left = heroX * cellW;
            hero.Top = heroY * cellH;
            hero.Width = cellW;
            hero.Height = cellH;
        }

        private void formSettings()
        {
            Text = "Tologato";
            BackColor = Color.White;
            FormBorderStyle = FormBorderStyle.FixedDialog;
            MaximizeBox = false;
            MinimizeBox = false;
        }

        //palya
        private void kezdes()
        {
            hero = new PictureBox();
            hero.SizeMode = PictureBoxSizeMode.StretchImage;
            hero.Image = Properties.Resources.hos;
            Controls.Add(hero);

            cells = new PictureBox[n, n];
            for (int i = 0; i < n; i++)
            {
                for (int j = 0; j < n; j++)
                {
                        cells[i, j] = new PictureBox();
                        cells[i, j].SizeMode = PictureBoxSizeMode.StretchImage;
                        Controls.Add(cells[i, j]);
                }
            }
        }

        private void button10_Click(object sender, EventArgs e)
        {

        }

        private void btn_top_Click(object sender, EventArgs e)
        {
            String[] nevek= { "Attila", "Peter", "Ferenc", "Jozsef", "Kata", "Marika", "Anna","Player1" };
            int[] top_pontok= { 10, 23, 14, 55, 102, 81, 80, ossz_pontok };

            gomboknemlatszanak();
            listView1.Visible = true;
            btn_vissza.Visible = true;
            listView1.View = View.Details;
            listView1.Items.Clear();

            for(int i=0;i<8;i++)
            {
                for(int j=0;j<7-i;j++)
                {
                    if(top_pontok[j]<top_pontok[j+1])
                    {
                        int temp = top_pontok[j];
                        top_pontok[j] = top_pontok[j + 1];
                        top_pontok[j + 1] = temp;

                        string tmp = nevek[j];
                        nevek[j] = nevek[j + 1];
                        nevek[j + 1] = tmp;
                    }
                }
            }
            int k = 1;
            for(int i=0;i<8;i++)
            {   
                ListViewItem lvi = new ListViewItem(k.ToString() + ".");
                lvi.SubItems.Add(nevek[i]);   
                lvi.SubItems.Add(top_pontok[i].ToString());

                listView1.Items.Add(lvi);
                k++;
            }
            
        }

        private void btn_vissza_Click(object sender, EventArgs e)
        {
            gomboklatszanak();
            btn_vissza.Visible = false;
        }

        private void gomboknemlatszanak()
        {
            button1.Visible = false;
            button2.Visible = false;
            button3.Visible = false;
            button4.Visible = false;
            button5.Visible = false;
            button6.Visible = false;
            button7.Visible = false;
            button8.Visible = false;
            button9.Visible = false;
            button10.Visible = false;
            button11.Visible = false;
            button12.Visible = false;
            btn_top.Visible = false;
            btn_vissza.Visible = false;
        }
        private void gomboklatszanak()
        {
            button1.Visible = true;
            button2.Visible = true;
            button3.Visible = true;
            button4.Visible = true;
            button5.Visible = true;
            button6.Visible = true;
            button7.Visible = true;
            button8.Visible = true;
            button9.Visible = true;
            button10.Visible = true;
            button11.Visible = true;
            button12.Visible = true;
            btn_top.Visible = true;
            listView1.Visible = false;
        }
    }
}
