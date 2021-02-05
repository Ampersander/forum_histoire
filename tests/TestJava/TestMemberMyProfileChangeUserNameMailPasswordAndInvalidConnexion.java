package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class TestMemberMyProfileChangeUserNameMailPasswordAndInvalidConnexion {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "https://www.google.com/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testMemberMyProfileChangeUserNameMailPasswordAndInvalidConnexion() throws Exception {
    driver.get("http://127.0.0.1:8080/login");
    driver.findElement(By.id("username")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("test26");
    driver.findElement(By.id("password")).click();
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("test26");
    driver.findElement(By.id("_submit")).click();
    driver.findElement(By.linkText("Mon compte")).click();
    assertEquals("test26", driver.findElement(By.xpath("//div[@id='content']/strong")).getText());
    assertEquals("Nom d'utilisateur : test26", driver.findElement(By.xpath("//div[@id='content']/div/p[2]")).getText());
    assertEquals("Adresse e-mail : test26@hotmail.com", driver.findElement(By.xpath("//div[@id='content']/div/p[3]")).getText());
    assertEquals("Nombre de Posts : L'utilisateur n'a pas encore écrit de post.", driver.findElement(By.xpath("//div[@id='content']/div/p[4]")).getText());
    driver.findElement(By.linkText("Modifier mon profil")).click();
    driver.findElement(By.id("fos_user_profile_form_username")).click();
    driver.findElement(By.id("fos_user_profile_form_username")).clear();
    driver.findElement(By.id("fos_user_profile_form_username")).sendKeys("test266");
    driver.findElement(By.id("fos_user_profile_form_email")).click();
    driver.findElement(By.id("fos_user_profile_form_email")).clear();
    driver.findElement(By.id("fos_user_profile_form_email")).sendKeys("test266@hotmail.com");
    driver.findElement(By.id("fos_user_profile_form_current_password")).click();
    driver.findElement(By.id("fos_user_profile_form_current_password")).clear();
    driver.findElement(By.id("fos_user_profile_form_current_password")).sendKeys("test26");
    driver.findElement(By.id("edit_prof_submit")).click();
    assertEquals("Le profil a été mis à jour.", driver.findElement(By.xpath("//div[@id='content']/div")).getText());
    assertEquals("test266", driver.findElement(By.xpath("//div[@id='content']/strong")).getText());
    assertEquals("Nom d'utilisateur : test266", driver.findElement(By.xpath("//div[@id='content']/div[2]/p[2]")).getText());
    assertEquals("Adresse e-mail : test266@hotmail.com", driver.findElement(By.xpath("//div[@id='content']/div[2]/p[3]")).getText());
    driver.findElement(By.linkText("Modifier mon profil")).click();
    driver.findElement(By.id("fos_user_profile_form_username")).click();
    driver.findElement(By.id("fos_user_profile_form_username")).clear();
    driver.findElement(By.id("fos_user_profile_form_username")).sendKeys("test26");
    driver.findElement(By.id("fos_user_profile_form_email")).click();
    driver.findElement(By.id("fos_user_profile_form_email")).click();
    driver.findElement(By.id("fos_user_profile_form_email")).clear();
    driver.findElement(By.id("fos_user_profile_form_email")).sendKeys("test26@hotmail.com");
    driver.findElement(By.id("fos_user_profile_form_current_password")).click();
    driver.findElement(By.id("fos_user_profile_form_current_password")).clear();
    driver.findElement(By.id("fos_user_profile_form_current_password")).sendKeys("test26");
    driver.findElement(By.id("edit_prof_submit")).click();
    assertEquals("Le profil a été mis à jour.", driver.findElement(By.xpath("//div[@id='content']/div")).getText());
    assertEquals("test26", driver.findElement(By.xpath("//div[@id='content']/strong")).getText());
    assertEquals("Nom d'utilisateur : test26", driver.findElement(By.xpath("//div[@id='content']/div[2]/p[2]")).getText());
    assertEquals("Adresse e-mail : test26@hotmail.com", driver.findElement(By.xpath("//div[@id='content']/div[2]/p[3]")).getText());
    driver.findElement(By.linkText("Modifier mon mot de passe")).click();
    driver.findElement(By.id("fos_user_change_password_form_current_password")).click();
    driver.findElement(By.id("fos_user_change_password_form_current_password")).clear();
    driver.findElement(By.id("fos_user_change_password_form_current_password")).sendKeys("test26");
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_first")).click();
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_first")).clear();
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_first")).sendKeys("test266");
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_second")).click();
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_second")).clear();
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_second")).sendKeys("test266");
    driver.findElement(By.xpath("//input[@value='Envoyer']")).click();
    assertEquals("Le mot de passe a été modifié.", driver.findElement(By.xpath("//div[@id='content']/div")).getText());
    driver.findElement(By.linkText("Déconnexion")).click();
    driver.findElement(By.id("username")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("test26");
    driver.findElement(By.id("password")).click();
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("test26");
    driver.findElement(By.id("_submit")).click();
    assertEquals("Identifiants invalides.", driver.findElement(By.xpath("//form/div")).getText());
    driver.findElement(By.id("password")).click();
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("test266");
    driver.findElement(By.id("_submit")).click();
    driver.findElement(By.linkText("Mon compte")).click();
    driver.findElement(By.linkText("Modifier mon mot de passe")).click();
    driver.findElement(By.id("fos_user_change_password_form_current_password")).click();
    driver.findElement(By.id("fos_user_change_password_form_current_password")).clear();
    driver.findElement(By.id("fos_user_change_password_form_current_password")).sendKeys("test266");
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_first")).click();
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_first")).clear();
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_first")).sendKeys("test26");
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_second")).click();
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_second")).clear();
    driver.findElement(By.id("fos_user_change_password_form_plainPassword_second")).sendKeys("test26");
    driver.findElement(By.xpath("//input[@value='Envoyer']")).click();
    assertEquals("Le mot de passe a été modifié.", driver.findElement(By.xpath("//div[@id='content']/div")).getText());
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
